<?php

namespace App\Policies\Master;

use App\Models\User;

class ClassEmpPolicy extends \App\Policies\Query
{
    /**
     * Determine whether the ClassEmp can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->cek($user->id, 'viewAny ClassEmp');
    }

    /**
     * Determine whether the ClassEmp can view the model.
     */
    public function view(User $user): bool
    {
        return $this->cek($user->id, 'view ClassEmp');
    }

    /**
     * Determine whether the ClassEmp can create models.
     */
    public function create(User $user): bool
    {
        return $this->cek($user->id, 'create ClassEmp');
    }

    /**
     * Determine whether the ClassEmp can update the model.
     */
    public function update(User $user): bool
    {
        return $this->cek($user->id, 'update ClassEmp');
    }

    /**
     * Determine whether the ClassEmp can delete the model.
     */
    public function delete(User $user): bool
    {
        return $this->cek($user->id, 'delete ClassEmp');
    }
}
