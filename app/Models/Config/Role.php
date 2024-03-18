<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function permission()
    {
        return $this->belongsToMany(\App\Models\Config\Permission::class, 'role_has_permissions');
    }
    
    public function team()
    {
        return $this->belongsToMany(\App\Models\Config\Role::class, 'role_teams');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'role_id', 'id');
    }
}
