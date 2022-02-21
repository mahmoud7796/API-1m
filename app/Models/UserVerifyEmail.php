<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerifyEmail extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','token'];

    public function users(){
       return  $this->belongsTo(User::class,'user_id');
    }
}
