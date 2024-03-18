<?php

namespace App\Policies\Master;

use App\Models\User;

class JobPositionPolicy extends \App\Policies\Query
{
    /**
     * Determine whether the JobPosition can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->cek($user->id, 'viewAny JobPosition');
    }

    /**
     * Determine whether the JobPosition can view the model.
     */
    public function view(User $user): bool
    {
        return $this->cek($user->id, 'view JobPosition');
    }

    /**
     * Determine whether the JobPosition can create models.
     */
    public function create(User $user): bool
    {
        return $this->cek($user->id, 'create JobPosition');
    }

    /**
     * Determine whether the JobPosition can update the model.
     */
    public function update(User $user): bool
    {
        return $this->cek($user->id, 'update JobPosition');
    }

    /**
     * Determine whether the JobPosition can delete the model.
     */
    public function delete(User $user): bool
    {
        return $this->cek($user->id, 'delete JobPosition');
    }
}
