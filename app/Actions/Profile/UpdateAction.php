<?php

namespace App\Actions\Profile;

use App\Http\Requests\Admin\ProfileUpdateRequest;

class UpdateAction
{
    /**
     * Execute the update action for the user profile.
     *
     * @param  ProfileUpdateRequest  $request  The validated request instance.
     * @return bool True if the update action was successful, otherwise false.
     */
    public function execute(ProfileUpdateRequest $request): bool
    {
        $validated = $request->validated();
        if (! $validated) {
            return false;
        }

        auth()->user()->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($request->hasFile('image')) {
            auth()->user()->clearMediaCollection('image')
                ->addMedia($request->file('image'))
                ->toMediaCollection('image');
        }

        return true;
    }
}
