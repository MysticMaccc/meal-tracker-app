<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AuthorizeNavigationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function authorizeMealTracker(User $user)
    {
        return $user->user_type_id == 1 || $user->user_type_id == 2 || $user->user_type_id == 3 ?
            Response::allow()
            :
            Response::deny('You are unauthorized to access this module.');
    }

    public function authorizeEmployeeList(User $user)
    {
        return $user->user_type_id == 1 || $user->user_type_id == 2 ?
            Response::allow()
            :
            Response::deny('You are unauthorized to access this module.');
    }

    public function authorizeReport(User $user)
    {
        return $user->user_type_id == 1 || $user->user_type_id == 2 || $user->user_type_id == 4 ?
            Response::allow()
            :
            Response::deny('You are unauthorized to access this module.');
    }

    public function authorizeSettings(User $user)
    {
        return $user->user_type_id == 1  ?
            Response::allow()
            :
            Response::deny('You are unauthorized to access this module.');
    }
}
