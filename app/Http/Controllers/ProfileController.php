<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function changePassword(Request $request, User $user)
    {
        $this->authorize('changePassword', $user);

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('success', 'New Password cannot be same as your current password.');
        } // should have created an 'error' message design, but this will do for now...

        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required', 'string', 'max:255', 'min:16',],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $user->update(['password' => $request->new_password]);

        return redirect()->route('profile.edit', $user)->with("success", "Password successfully changed!");
    }

    public function update(Request $request, User $user)
    {

        $this->authorize('update', $user);

        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        if ($request->avatar != null) {
            $imagepath = request('avatar')->store('uploads', 'public');

            $attributes['avatar'] = "/storage/" . $imagepath;

            Storage::delete(str_replace('/storage', '/public', $user->avatar));

            $user->update($attributes);
        }

        $user->update($attributes);

        return redirect('/profile')->with('success', 'Your profile was successfully updated.');
    }

    public function destroy(Request $request, User $user)
    {

        $this->authorize('delete', $user);

        $user->delete();

        $request->session()->invalidate();

        return redirect('login')->with('success', 'Your account and your data has been deleted.');
    }
}
