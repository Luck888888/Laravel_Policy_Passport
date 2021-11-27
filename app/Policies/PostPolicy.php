<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return bool
     */

    public function __construct()
    {
        //
    }

    public function viewManager(User $user)
    {
        if ($user->name == 'manager') return true;
    }
}
