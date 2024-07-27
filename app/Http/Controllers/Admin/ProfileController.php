<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Profile\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Show the profile index page.
     */
    public function index(): View
    {
        return view('profile.index');
    }

    /**
     * Update the user's profile.
     */
    public function update(ProfileUpdateRequest $request, UpdateAction $action): RedirectResponse
    {
        if ($action->execute($request)) {
            return redirect()->route('profile')->with('status', ['status' => true, 'message' => 'Profile updated.']);
        } else {
            return redirect()->route('profile')->with('status', ['status' => false, 'message' => 'Failed to update profile. Please try again.']);
        }
    }

    /**
     * Delete the user's profile image.
     */
    public function delete_profile(): RedirectResponse
    {
        if (! auth()->user()->hasMedia('image')) {
            return redirect()->route('profile')->with('status', ['status' => false, 'message' => 'Profile image not found.']);
        }

        auth()->user()->clearMediaCollection('image');

        return redirect()->route('profile')->with('status', ['status' => true, 'message' => 'Profile image deleted.']);
    }
}
