<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  User  $user  The user to be deleted.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
