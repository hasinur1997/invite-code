<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'activated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'activated_at'  =>  'datetime'
    ];

    public function active() 
    {
        return !is_null($this->activated_at);
    }

    public function activate()
    {
        $this->update(['activated_at' => now()]);
    }

    public function inviteCodes()
    {
        return $this->hasMany(InviteCode::class);
    }

    public function hasReachedLimit()
    {
        return $this->inviteCodes()->count() > 2;
    }
}
