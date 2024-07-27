<?php

namespace App\Actions\Requests;

use App\Enums\RequestType;
use App\Http\Requests\Admin\Requests\RequestsCreateRequest;
use App\Models\GeoIP;
use App\Models\Request;
use App\Models\UsersRequests;
use BadMethodCallException;

class AddAction
{
    /**
     * Execute the add action for a new request.
     *
     * @param  RequestsCreateRequest  $request  The validated request instance
     * @return bool True if the action was executed successfully, false otherwise
     */
    public function execute(RequestsCreateRequest $request, string $ip): bool
    {
        $validated = $request->validated();
        if (! $validated) {
            return false;
        }

        try {
            $type = RequestType::tryFrom($request->type);
            $calculate = calculatorSubmit($request->amount, $request->vat, $type);

            $request = Request::firstOrCreate(
                [
                    'vat' => $validated['vat'],
                    'amount' => $validated['amount'],
                    'currency_id' => $validated['currency_id'],
                    'type' => $type->value,

                    'vat_result' => (float) $calculate['vat_result'],
                    'amount_result' => (float) $calculate['amount_result'],
                ]
            );

            $existingIP = GeoIP::where('ip', $ip)->first();
            if (! $existingIP) {
                $ipCountry = getCountryCode($ip);

                $existingIP = GeoIP::create([
                    'ip' => $ip,
                    'country' => $ipCountry,
                ]);
            }

            UsersRequests::create([
                'user_id' => auth()->user()->id,
                'request_id' => $request->id,
                'ip_id' => $existingIP->id,
            ]);

            return true;
        } catch (BadMethodCallException $exception) {
            return false;
        }
    }
}
