<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Destination;
use App\Models\User;

class DestinationPolicy
{

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
    public function update(User $user, Destination $destination): bool
    {
        return $user->id === $destination->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Destination $destination): bool
    {
        return $user->id === $destination->user_id;
    }

}
