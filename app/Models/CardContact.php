<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'contact_id',
    ];
    public $timestamps = true;
}
