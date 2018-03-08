<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   protected $fillable = [
        'name', 'user_id','product_id', 'price','quantity' ,
    ];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
