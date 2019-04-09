<?php

namespace App\Policies;

use App\User;
use App\Macro;
use Illuminate\Auth\Access\HandlesAuthorization;

class MacroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the macro.
     *
     * @param  \App\User  $user
     * @param  \App\Macro  $macro
     * @return mixed
     */
    public function view(User $user, Macro $macro)
    {
        //
    }

    /**
     * Determine whether the user can create macros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (auth()-user()->isTechnologist()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the macro.
     *
     * @param  \App\User  $user
     * @param  \App\Macro  $macro
     * @return mixed
     */
    public function update(User $user, Macro $macro)
    {
        return $macro->technologis_id = $user->id;
    }

    /**
     * Determine whether the user can delete the macro.
     *
     * @param  \App\User  $user
     * @param  \App\Macro  $macro
     * @return mixed
     */
    public function delete(User $user, Macro $macro)
    {
        //
    }

    /**
     * Determine whether the user can restore the macro.
     *
     * @param  \App\User  $user
     * @param  \App\Macro  $macro
     * @return mixed
     */
    public function restore(User $user, Macro $macro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the macro.
     *
     * @param  \App\User  $user
     * @param  \App\Macro  $macro
     * @return mixed
     */
    public function forceDelete(User $user, Macro $macro)
    {
        //
    }
}
