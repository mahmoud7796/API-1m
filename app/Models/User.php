<?php

namespace App\Models;

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
        'id',
        'fullName',
        'email',
        'login_id',
        'login_criteria',
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
        'pivot'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contact(){
        return $this->hasMany(Contact::class,'user_id');
    }

    public function added(){
        return $this->belongsToMany(self::class, 'connections', 'adder_id','added_id','id','id');
    }

    public function adder(){
        return $this->belongsToMany(self::class, 'connections', 'added_id','adder_id','id','id');
    }

    public function token(){
        return  $this->hasOne(UserVerifyEmail::class,'user_id');
    }


}
