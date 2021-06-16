<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AksesPolicy
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
    public function akses_admin (User $user) {
        return ($user->email === 'admin@admin.com')
            OR ($user->id === 1)
            OR ($user->remember_token === 'admin');
    }
    public function akses_member (User $user) {
        return $user->remember_token === NULL;
    }
}
