<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function application() {
        return $this->hasOne(Application::class, 'user_id');
    }

    public function undergrads() {
        return $this->hasMany(Undergrad::class, 'user_id');
    }

    public function masters() {
        return $this->hasMany(Master::class, 'user_id');
    }

    public function phds() {
        return $this->hasMany(Phd::class, 'user_id');
    }

    public function prcs() {
        return $this->hasMany(Prc::class, 'user_id');
    }

    public function mpos() {
        return $this->hasMany(Mpo::class, 'user_id');
    }
}
