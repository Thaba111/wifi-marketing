<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'auth_provider',
        'auth_provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'type' => UserTypes::class,
        ];
    }

//     public function scopeAdmins($query)
//     {
//         return $query->where('role', UserTypes::ADMIN);
//     }

//     public function scopeMarketers($query)
//     {
//         return $query->where('role', UserTypes::MARKETER);
//     }

//     public function scopeViewers($query)
//     {
//         return $query->where('role', UserTypes::VIEWER);
//     }

//     public function isAdmin()
// {
//     return $this->role === 'admin'; 
// }
}
