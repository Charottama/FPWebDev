<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;
    protected $table = 'transactions';
    protected $fillable = ['user_id', 'recipe_id', 'address', 'phone', 'total_price', 'quantity', 'payment', '
    time'];
    protected $guarded = [];

    public function userTrans(){
    	return $this->belongsTo('App\Users', 'user_id');
    }

}
