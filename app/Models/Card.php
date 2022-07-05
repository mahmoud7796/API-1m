<?php

namespace App\Models;

use App\Observers\CardObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;


        protected $fillable = [
            'id',
            'name',
            'user_id',
            'qr_url',
            'description',
            'is_featured',
            'short_link',
            'company_name',
            'job_title'
        ];

    protected $casts =  [
        'is_featured' => 'boolean',
    ];
    public $timestamps = true;
    protected $hidden = ['pivot'];


    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'card_contacts', 'card_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function connection()
    {
        return $this->hasMany(Connection::class, 'card_id');
    }

    public function getQrUrlAttribute($value)
    {
        return $this->attributes['qr_url']=asset($value) ;
    }

    public function view()
    {
        return $this->hasMany(View::class,'card_id');
    }

    protected static function boot()
    {
        parent::boot();
        Card::observe(CardObserver::class);
    }

}
