<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    // $router->resource('demo/users', UserController::class);
    $router->resource('/chef', AdminChefController::class);    
    $router->resource('/recipe',AdminRecipeController::class);
    $router->resource('/ingredients', AdminIngredientsController::class);
    $router->resource('/instructions', AdminInstructionsController::class);
    $router->resource('/user', AdminUserController::class);
    $router->resource('/transaction', AdminTransactionController::class);


});
