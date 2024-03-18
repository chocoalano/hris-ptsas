<?php

namespace App\Policies\Master;

use App\Models\User;

class BranchPolicy extends \App\Policies\Query
{
    /**
     * Determine whether the Branch can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->cek($user->id, 'viewAny Branch');
    }

    /**
     * Determine whether the Branch can view the model.
     */
    public function view(User $user): bool
    {
        return $this->cek($user->id, 'view Branch');
    }

    /**
     * Determine whether the Branch can create models.
     */
    public function create(User $user): bool
    {
        return $this->cek($user->id, 'create Branch');
    }

    /**
     * Determine whether the Branch can update the model.
     */
    public function update(User $user): bool
    {
        return $this->cek($user->id, 'update Branch');
    }

    /**
     * Determine whether the Branch can delete the model.
     */
    public function delete(User $user): bool
    {
        return $this->cek($user->id, 'delete Branch');
    }
}
