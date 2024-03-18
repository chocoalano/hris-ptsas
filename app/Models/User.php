<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'mobile_phone',
        'phone',
        'placebirth',
        'birthdate',
        'gender',
        'bloodtype',
        'religion',
        'identity_address',
        'identity_numbers',
        'identity_expired',
        'postal_code',
        'citizen_idaddress',
        'recidential_address',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(): HasOne {
        return $this->hasOne(\App\Models\Config\Role::class, 'id', 'role_id');
    }
}
