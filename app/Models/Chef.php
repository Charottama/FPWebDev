<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    public $timestamps = false;
    protected $table = 'chefs';
    protected $fillable = ['chef_name', 'username', 'password'];
    protected $guarded = [];

    public function Recipe(){
    	return $this->hasMany('App\Models\Recipe', 'chef_id');
    }
}
