<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'viewed_id',
        'viewer_id',
        'card_id',
        'DateTime'
    ];

    public $timestamps = true;

    public function card()
    {
        return $this->belongsTo(Card::class,'card_id');
    }
}

