<?php

namespace App\Policies\Serviceperson;

use App\Models\Authentication\User;
use App\Models\Serviceperson\ReEngagement;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReEngagementPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('super-admin')){
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param ReEngagement $reEngagement
     * @return mixed
     */
    public function view(User $user, ReEngagement $reEngagement)
    {
        if ($user->can('view-record-card')){
            return true;
        }

        if ($user->can('view-service-data')){
            return true;
        }

        $user->hasModel('re_Engagements', $reEngagement);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('create-record-card')){
            return true;
        }

        if ($user->can('create-service-data')){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ReEngagement $reEngagement
     * @return mixed
     */
    public function update(User $user, ReEngagement $reEngagement)
    {
        if ($user->can('update-record-card')){
            return true;
        }

        if ($user->can('update-service-data')){
            return true;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ReEngagement $reEngagement
     * @return mixed
     */
    public function delete(User $user, ReEngagement $reEngagement)
    {
        if ($user->can('delete-record-card')){
            return true;
        }

        if ($user->can('delete-service-data')){
            return true;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param ReEngagement $reEngagement
     * @return mixed
     */
    public function restore(User $user, ReEngagement $reEngagement)
    {
        if ($user->can('restore-record-card')){
            return true;
        }

        if ($user->can('restore-service-data')){
            return true;
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param ReEngagement $reEngagement
     * @return mixed
     */
    public function forceDelete(User $user, ReEngagement $reEngagement)
    {
        if ($user->can('force-delete-record-card')){
            return true;
        }

        if ($user->can('force-delete-service-data')){
            return true;
        }

    }
}
