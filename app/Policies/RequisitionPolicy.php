<?php

namespace App\Policies;

use App\User;
use App\Requisition;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequisitionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the requisition.
     *
     * @param  \App\User  $user
     * @param  \App\Requisition  $requisition
     * @return mixed
     */
    public function view(User $user, Requisition $requisition)
    {
        if (auth()->user()->isClinician()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create requisitions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the requisition.
     *
     * @param  \App\User  $user
     * @param  \App\Requisition  $requisition
     * @return mixed
     */
    public function update(User $user, Requisition $requisition)
    {
       //
    }

    /**
     * Determine whether the user can delete the requisition.
     *
     * @param  \App\User  $user
     * @param  \App\Requisition  $requisition
     * @return mixed
     */
    public function delete(User $user, Requisition $requisition)
    {
        //
    }

    /**
     * Determine whether the user can restore the requisition.
     *
     * @param  \App\User  $user
     * @param  \App\Requisition  $requisition
     * @return mixed
     */
    public function restore(User $user, Requisition $requisition)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the requisition.
     *
     * @param  \App\User  $user
     * @param  \App\Requisition  $requisition
     * @return mixed
     */
    public function forceDelete(User $user, Requisition $requisition)
    {
        //
    }
}
