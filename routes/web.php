<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group([
    'namespace' => '\App\Http\Controllers\User',
    'middleware' => 'auth',
], function ()
{
    Route::resource('/my_team', 'MyTeam\IndexController')->names('user.myTeam');
    Route::post('/my_team/add', 'MyTeam\IndexController@addPlayer')->name('user.myTeam.addPlayer');
});

Route::group([
    'namespace' => '\App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => 'auth',
], function ()
{
    Route::resource('/team', 'TeamsController')->names('admin.teams');
    Route::resource('/players', 'PlayersController')->names('admin.players');
});