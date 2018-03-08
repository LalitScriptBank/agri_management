<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   protected $fillable = [
        'name', 'user_id','product_id', 'price','quantity' ,
    ];


    public function user()
    {
        return $this->belongsToMany(App\User::class);
    }


    public function product()
    {
        return $this->belongsToMany(Product::class,'product_id');
    }


}
