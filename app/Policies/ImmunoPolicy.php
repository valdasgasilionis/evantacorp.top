<?php

namespace App\Policies;

use App\User;
use App\Immuno;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImmunoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the immuno.
     *
     * @param  \App\User  $user
     * @param  \App\Immuno  $immuno
     * @return mixed
     */
    public function view(User $user, Immuno $immuno)
    {
        //
    }

    /**
     * Determine whether the user can create immunos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the immuno.
     *
     * @param  \App\User  $user
     * @param  \App\Immuno  $immuno
     * @return mixed
     */
    public function update(User $user, Immuno $immuno)
    {
        //
    }

    /**
     * Determine whether the user can delete the immuno.
     *
     * @param  \App\User  $user
     * @param  \App\Immuno  $immuno
     * @return mixed
     */
    public function delete(User $user, Immuno $immuno)
    {
        //
    }

    /**
     * Determine whether the user can restore the immuno.
     *
     * @param  \App\User  $user
     * @param  \App\Immuno  $immuno
     * @return mixed
     */
    public function restore(User $user, Immuno $immuno)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the immuno.
     *
     * @param  \App\User  $user
     * @param  \App\Immuno  $immuno
     * @return mixed
     */
    public function forceDelete(User $user, Immuno $immuno)
    {
        //
    }
}
