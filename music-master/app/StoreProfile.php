<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProfile extends Model
{

    protected $table = 'store_profiles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['map_location', 'name', 'short_description', 'image', 'logo', 'schedules', 'offline_payment_methods_accepted', 'delivery_zone', 'delivery_fees', 'social_profiles', 'currency', 'whasapp_number','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}