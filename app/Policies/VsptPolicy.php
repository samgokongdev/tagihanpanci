<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vspt;
use Illuminate\Auth\Access\HandlesAuthorization;

class VsptPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3', 'pelayanan']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vspt  $vspt
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Vspt $vspt)
    {
        return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3', 'pelayanan']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vspt  $vspt
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Vspt $vspt)
    {
        return $user->hasRole(['admin', 'pelp3', 'pelayanan']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vspt  $vspt
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vspt $vspt)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vspt  $vspt
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vspt $vspt)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vspt  $vspt
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vspt $vspt)
    {
        //
    }
}
