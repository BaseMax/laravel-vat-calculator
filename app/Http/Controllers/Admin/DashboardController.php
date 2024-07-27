<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RequestDataTable;
use App\Enums\RequestType;
use App\Http\Controllers\Controller;
use App\Models\GeoIP;
use App\Models\Request;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\UsersRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(RequestDataTable $requestDataTable)
    {
        $users_count = User::count();
        $users_login_count = User::whereHas('login')->count();

        $requests_count = UsersRequests::count();
        $requests_uniqe_count = Request::count();

        $total_add_requests = Request::addRequests()->count();
        $total_exclude_requests = Request::excludeRequests()->count();

        $requests_count_today = UsersRequests::whereDate('created_at', Carbon::today())->count();
        $requests_uniqe_count_today = Request::whereDate('created_at', Carbon::today())->count();

        $requests_count_yesterday = UsersRequests::whereDate('created_at', Carbon::yesterday())->count();
        $requests_uniqe_yesterday = Request::whereDate('created_at', Carbon::yesterday())->count();

        $startDate = Carbon::now()->subMonths(2)->startOfMonth();
        $endDate = Carbon::now()->startOfMonth();

        $chart_summary_dates = [];
        $chart_summary_addition = [];
        $chart_summary_exclude = [];

        while ($startDate->lessThanOrEqualTo($endDate)) {
            $currentDate = $startDate->copy();
            while ($currentDate->isSameMonth($startDate)) {
                if ($currentDate->greaterThan(Carbon::today())) {
                    break 2;
                }

                $additionCount = UsersRequests::whereDate('users_requests.created_at', $currentDate)
                    ->join('requests', 'users_requests.request_id', '=', 'requests.id')
                    ->where('requests.type', RequestType::ADD()->value)
                    ->count();

                $excludeCount = UsersRequests::whereDate('users_requests.created_at', $currentDate)
                    ->join('requests', 'users_requests.request_id', '=', 'requests.id')
                    ->where('requests.type', RequestType::EXCLUDE()->value)
                    ->count();

                $chart_summary_addition[] = $additionCount;
                $chart_summary_exclude[] = $excludeCount;
                $chart_summary_dates[] = $currentDate->format('Y-m-d');

                $currentDate->addDay();
            }

            $startDate->addMonth();
        }

        $chart_countries = GeoIP::select('country', DB::raw('COUNT(*) as request_count'))
            ->join('users_requests', 'geo_ips.id', '=', 'users_requests.ip_id')
            ->groupBy('country')
            ->orderBy('request_count', 'desc')
            ->pluck('request_count', 'country');

        $total_sessions = UserLogin::count();
        $recent_sessions = UserLogin::selectRaw('user_logins.created_at,
                        users.id as user_id,
                        users.image as user_image,
                        users.name as user_name')
            ->join('users', 'users.id', '=', 'user_logins.user_id')
            ->orderByDesc('user_logins.created_at')
            ->limit(10)
            ->get();

        $recent_requests = UsersRequests::selectRaw('users_requests.created_at,
                        users.id as user_id,
                        users.image as user_image,
                        users.name as user_name,
                        requests.id as request_id,
                        requests.vat,
                        requests.amount,
                        requests.type,
                        currencies.name as currency_name')
            ->join('users', 'users.id', '=', 'users_requests.user_id')
            ->join('requests', 'requests.id', '=', 'users_requests.request_id')
            ->join('currencies', 'currencies.id', '=', 'requests.currency_id')
            ->orderByDesc('users_requests.created_at')
            ->limit(10)
            ->get();

        $add_percentage =
            $requests_uniqe_count > 0
            ? ($total_add_requests / $requests_uniqe_count) * 100
            : 0;
        $exclude_percentage =
            $requests_uniqe_count > 0
            ? ($total_exclude_requests / $requests_uniqe_count) * 100
            : 0;

        $params = [
            'users_count' => $users_count,
            'users_login_count' => $users_login_count,

            'requests_count' => $requests_count,
            'requests_uniqe_count' => $requests_uniqe_count,

            'requests_count_today' => $requests_count_today,
            'requests_uniqe_count_today' => $requests_uniqe_count_today,

            'requests_count_yesterday' => $requests_count_yesterday,
            'requests_uniqe_yesterday' => $requests_uniqe_yesterday,

            'total_sessions' => $total_sessions,
            'recent_sessions' => $recent_sessions,

            'recent_requests' => $recent_requests,

            'total_add_requests' => $total_add_requests,
            'add_percentage' => $add_percentage,
            'total_exclude_requests' => $total_exclude_requests,
            'exclude_percentage' => $exclude_percentage,

            'chart_summary_addition' => $chart_summary_addition,
            'chart_summary_exclude' => $chart_summary_exclude,
            'chart_summary_dates' => $chart_summary_dates,

            'chart_countries' => $chart_countries,
        ];

        return $requestDataTable->render('dashboard', $params);
    }
}
