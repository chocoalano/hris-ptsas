<?php

namespace App\Policies\Master;

use App\Models\User;

class GradePolicy extends \App\Policies\Query
{
    /**
     * Determine whether the Grade can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->cek($user->id, 'viewAny Grade');
    }

    /**
     * Determine whether the Grade can view the model.
     */
    public function view(User $user): bool
    {
        return $this->cek($user->id, 'view Grade');
    }

    /**
     * Determine whether the Grade can create models.
     */
    public function create(User $user): bool
    {
        return $this->cek($user->id, 'create Grade');
    }

    /**
     * Determine whether the Grade can update the model.
     */
    public function update(User $user): bool
    {
        return $this->cek($user->id, 'update Grade');
    }

    /**
     * Determine whether the Grade can delete the model.
     */
    public function delete(User $user): bool
    {
        return $this->cek($user->id, 'delete Grade');
    }
}
