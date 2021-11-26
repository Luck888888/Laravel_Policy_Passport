<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryControllerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewForbiddenSection(?User $user)
    {
        if ($user && $user->name == 'manager') {
            return Response::allow('Вам разрешено');
        }
        return Response::deny('Вам запрещено');
    }
}
