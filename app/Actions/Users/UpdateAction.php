<?php

namespace App\Actions\Users;

use App\Enums\UserRole;
use App\Http\Requests\Admin\Users\UsersUpdateRequest;
use App\Models\User;

class UpdateAction
{
    /**
     * Execute the update action for the user.
     *
     * @param  User  $user  The user instance
     * @param  UsersUpdateRequest  $request  The validated request instance
     * @return bool True if the action was executed successfully, false otherwise
     */
    public function execute(User $user, UsersUpdateRequest $request): bool
    {
        $validated = $request->validated();
        if (! $validated) {
            return false;
        }

        $user->fill($validated);
        $user->is_admin = $request->filled('admin') ? UserRole::ADMIN()->value : UserRole::USER()->value;

        if ($request->hasFile('image')) {
            $user->clearMediaCollection('image')
                ->addMedia($request->file('image'))
                ->toMediaCollection('image');
        }

        $user->save();

        return true;
    }
}
