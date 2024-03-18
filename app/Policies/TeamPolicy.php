<?php

namespace App\Policies;

use App\Models\Config\Team;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeamPolicy extends \App\Policies\Query
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->cek($user->id, 'viewAny Team');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $this->cek($user->id, 'view Team');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->cek($user->id, 'create Team');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $this->cek($user->id, 'update Team');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $this->cek($user->id, 'delete Team');
    }
}
