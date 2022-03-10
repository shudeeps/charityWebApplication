<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'name', 'address','cart','user_id','payment_id'
    ];


    public function user(){
        return $this->belongsTo('App\User');

    }
}
