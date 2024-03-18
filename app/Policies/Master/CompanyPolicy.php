<?php

namespace App\Policies\Master;

use App\Models\User;

class CompanyPolicy extends \App\Policies\Query
{
    /**
     * Determine whether the Company can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->cek($user->id, 'viewAny Company');
    }

    /**
     * Determine whether the Company can view the model.
     */
    public function view(User $user): bool
    {
        return $this->cek($user->id, 'view Company');
    }

    /**
     * Determine whether the Company can create models.
     */
    public function create(User $user): bool
    {
        return $this->cek($user->id, 'create Company');
    }

    /**
     * Determine whether the Company can update the model.
     */
    public function update(User $user): bool
    {
        return $this->cek($user->id, 'update Company');
    }

    /**
     * Determine whether the Company can delete the model.
     */
    public function delete(User $user): bool
    {
        return $this->cek($user->id, 'delete Company');
    }
}
