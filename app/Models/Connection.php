<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $fillable = [
        'adder_id',
        'added_id',
        'card_id ',
        'connection_status',
    ];
    public $timestamps = true;

}
