<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'description', 'price', 'sale_price', 'stock', 'status', 'image', 'category_id','store_profile_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
}