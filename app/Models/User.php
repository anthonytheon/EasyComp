<?php

namespace App\Models;

//use App\Models\Competition;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    public function competitions(){
        return $this->hasMany(Competition::class);
    }

    public function isAdmin(){ // admin
        if ($this->role->name == 'Admin'){
            return true;
        }
        return false;
    }

    public function isUser(){ // user
        if ($this->role->name == 'User'){
            return true;
        }
        return false;
    }

}
