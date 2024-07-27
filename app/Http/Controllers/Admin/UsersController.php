<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Users\AddAction;
use App\Actions\Users\UpdateAction;
use App\DataTables\UsersDataTable;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UsersCreateRequest;
use App\Http\Requests\Admin\Users\UsersUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(UsersDataTable $usersDataTable): mixed
    {
        $usersCount = User::count();

        return $usersDataTable->render('users.index', [
            'count' => $usersCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        if (auth()->user()->is_admin !== UserRole::ADMIN()->value) {
            return redirect()->route('dashboard')->with('status', [
                'status' => false,
                'message' => 'You do not have access to create a new user.',
            ]);
        }

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersCreateRequest $request, AddAction $action): RedirectResponse
    {
        if ($action->execute($request)) {
            return redirect()->route('users.index')->with('status', ['status' => true, 'message' => 'User has been created.']);
        } else {
            return redirect()->back()->with('status', ['status' => false, 'message' => 'Failed to create the user. Please try again.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersUpdateRequest $request, User $user, UpdateAction $action): RedirectResponse
    {
        if ($action->execute($user, $request)) {
            return redirect()->route('users.index')->with('status', ['status' => true, 'message' => 'User has been updated.']);
        } else {
            return redirect()->back()->with('status', ['status' => false, 'message' => 'Failed to update the user. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->delete()) {
            return redirect()->route('users.index')->with('status', ['status' => true, 'message' => 'User has been deleted.']);
        } else {
            return redirect()->route('users.index')->with('status', ['status' => false, 'message' => 'Failed to delete the user. Please try again.']);
        }
    }
}
