<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'imgURL',
    ];

    public $timestamps = true;

    public function contact(){
        return $this->hasMany(Contact::class,'provider_id');
    }
}
