<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vtunggakan;
use Illuminate\Auth\Access\HandlesAuthorization;

class VtunggakanPolicy
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
        return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vtunggakan  $vtunggakan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Vtunggakan $vtunggakan)
    {
        return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vtunggakan  $vtunggakan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Vtunggakan $vtunggakan)
    {
        return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vtunggakan  $vtunggakan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vtunggakan $vtunggakan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vtunggakan  $vtunggakan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vtunggakan $vtunggakan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vtunggakan  $vtunggakan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vtunggakan $vtunggakan)
    {
        //
    }
}
