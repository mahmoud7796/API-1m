<?php

namespace App\Models;

use App\Observers\CardObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public $timestamps = true;
    protected $hidden = ['pivot'];


    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'card_contacts', 'card_id');
    }

    public function connection()
    {
        return $this->belongsTo(Connection::class, );
    }

    protected static function boot()
    {
        parent::boot();
        Card::observe(CardObserver::class);
    }

}
