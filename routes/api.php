<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);

Route::get('menu', ['as' => 'menu.index', 'uses' => 'MenuController@index']);

Route::get('menu/{menu_id}/product', ['as' => 'menu.index', 'uses' => 'MenuController@products']);

Route::get('product', ['as' => 'product.index', 'uses' => 'ProductController@index']);

Route::get('cart', ['as' => 'cart.index', 'uses' => 'CartController@index']);

