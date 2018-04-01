<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $timestamps=false;
            $table->increments('id');

            $table->integer('chef_id')->unsigned();
            $table->foreign('chef_id')
                ->references('id')->on('chefs')
                ->onDelete('cascade');

            $table->string('food_name');
            $table->integer('price');
            $table->integer('prep_time');
            $table->integer('servings');
            $table->string('nutritions');
            $table->string('image', 100);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
