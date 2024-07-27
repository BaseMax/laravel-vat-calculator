<?php

namespace App\Actions\Users;

use App\Enums\UserRole;
use App\Http\Requests\Admin\Users\UsersCreateRequest;
use App\Models\User;
use Illuminate\Support\Str;

class AddAction
{
    /**
     * Execute the add action for a new user.
     *
     * @param  UsersCreateRequest  $request  The validated request instance
     * @return bool True if the action was executed successfully, false otherwise
     */
    public function execute(UsersCreateRequest $request): bool
    {
        $validated = $request->validated();
        if (! $validated) {
            return false;
        }

        $user = new User($request->only('name', 'email'));
        $user->password = bcrypt(Str::random(8));
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
