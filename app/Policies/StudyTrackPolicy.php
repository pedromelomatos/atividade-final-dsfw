<?php

namespace App\Policies;

use App\Models\StudyTrack;
use App\Models\User;

class StudyTrackPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StudyTrack $studyTrack): bool
    {
        return $user->isAdmin() || $studyTrack->user()->is($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudyTrack $studyTrack): bool
    {
        return $user->isAdmin() || $studyTrack->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudyTrack $studyTrack): bool
    {
        return $user->isAdmin() || $studyTrack->user()->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StudyTrack $studyTrack): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StudyTrack $studyTrack): bool
    {
        return $user->isAdmin();
    }
}
