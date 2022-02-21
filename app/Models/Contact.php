<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'user_id',
        'contact_string'
    ];

    public $timestamps = true;
    protected $hidden = ['pivot'];


    public function card(){
        return $this->belongsToMany(Card::class,'card_contacts','contact_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class,'provider_id');
    }

    protected static function boot()
    {
        parent::boot();
        Contact::observe(ContactObserver::class);
    }

}
