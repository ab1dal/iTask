<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function delete(User $user)
    {
        return $user->id === auth()->user()->id;
    }

    public function update(User $user)
    {
        return $user->id === auth()->user()->id;
    }

    public function changepassword(User $user)
    {
        return $user->id === auth()->user()->id;
    }
}
