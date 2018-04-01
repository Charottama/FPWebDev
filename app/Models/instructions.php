<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instructions extends Model
{
    public $timestamps = false;
    protected $table = 'instructions';
    protected $fillable = ['recipeId','instruction'];
    protected $guarded = [];

    public function RecipeIns(){
    	return $this->belongsTo('App\Models\Recipe', 'recipeId');
    }
}
