<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingredients extends Model
{
    public $timestamps = false;
    protected $table = 'ingredients';
    protected $fillable = ['recipe_id', 'ingredient_name', 'quantity'];
    protected $guarded = [];

    public function RecipeIng(){
    	return $this->belongsTo('App\Models\Recipe', 'recipe_id');
    }
}
