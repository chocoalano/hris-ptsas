<?php

namespace App\Policies\Master;

use App\Models\User;

class OrganizationPolicy extends \App\Policies\Query
{
    /**
     * Determine whether the Organization can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->cek($user->id, 'viewAny Organization');
    }

    /**
     * Determine whether the Organization can view the model.
     */
    public function view(User $user): bool
    {
        return $this->cek($user->id, 'view Organization');
    }

    /**
     * Determine whether the Organization can create models.
     */
    public function create(User $user): bool
    {
        return $this->cek($user->id, 'create Organization');
    }

    /**
     * Determine whether the Organization can update the model.
     */
    public function update(User $user): bool
    {
        return $this->cek($user->id, 'update Organization');
    }

    /**
     * Determine whether the Organization can delete the model.
     */
    public function delete(User $user): bool
    {
        return $this->cek($user->id, 'delete Organization');
    }
}
