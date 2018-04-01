<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $timestamps = false;
    protected $table = 'recipes';
    protected $fillable = ['chef_id', 'food_name', 'price', 'prep_time', 'servings', 'nutritions', 'image'];
    protected $guarded = [];

    public function chef(){
    	return $this->belongsTo('App\Models\Chef', 'chef_id');
    }

    public function ingredients(){
    	return $this->hasMany('App\Models\ingredients', 'recipe_id');
    }

    public function instructions(){
    	return $this->hasMany('App\Models\instructions', 'recipeId');
    }

    public function transactions(){
        return $this->hasMany('App\Models\Transaction', 'recipe_id');
    }
}
