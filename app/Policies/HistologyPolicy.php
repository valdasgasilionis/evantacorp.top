<?php

namespace App\Policies;

use App\User;
use App\Histology;
use Illuminate\Auth\Access\HandlesAuthorization;

class HistologyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the histology.
     *
     * @param  \App\User  $user
     * @param  \App\Histology  $histology
     * @return mixed
     */
    public function view(User $user, Histology $histology)
    {
        //
    }

    /**
     * Determine whether the user can create histologies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (auth()->user()->isTechnologist()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the histology.
     *
     * @param  \App\User  $user
     * @param  \App\Histology  $histology
     * @return mixed
     */
    public function update(User $user, Histology $histology)
    {
        return $histology->technologist_id = $user->id;
    }

    /**
     * Determine whether the user can delete the histology.
     *
     * @param  \App\User  $user
     * @param  \App\Histology  $histology
     * @return mixed
     */
    public function delete(User $user, Histology $histology)
    {
        //
    }

    /**
     * Determine whether the user can restore the histology.
     *
     * @param  \App\User  $user
     * @param  \App\Histology  $histology
     * @return mixed
     */
    public function restore(User $user, Histology $histology)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the histology.
     *
     * @param  \App\User  $user
     * @param  \App\Histology  $histology
     * @return mixed
     */
    public function forceDelete(User $user, Histology $histology)
    {
        //
    }
}
