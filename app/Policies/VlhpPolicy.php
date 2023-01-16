<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vlhp;
use Illuminate\Auth\Access\HandlesAuthorization;

class VlhpPolicy
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
     * @param  \App\Models\Vlhp  $vlhp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Vlhp $vlhp)
    {
        // return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3']);
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
     * @param  \App\Models\Vlhp  $vlhp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Vlhp $vlhp)
    {
        return $user->hasRole(['admin', 'kakap', 'kasip3', 'pelp3']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vlhp  $vlhp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vlhp $vlhp)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vlhp  $vlhp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vlhp $vlhp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vlhp  $vlhp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vlhp $vlhp)
    {
        //
    }
}
