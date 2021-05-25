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
],
    function ()
{
    Route::group([
        'namespace' => 'MyTeam',
    ], function ()
    {
        Route::resource('/my_team', 'IndexController')->names('user.myTeam');
        Route::post('/my_team/add', 'IndexController@addPlayer')->name('user.myTeam.addPlayer');
        Route::post('/my_team/delete/{id}', 'IndexController@destroyPlayer')->name('user.myTeam.destroyPlayer');
    });

    Route::resource('/league', 'League\IndexController')->names('user.league');

});


Route::group([
    'namespace' => '\App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => 'auth',
],
    function ()
{
    Route::resource('/team', 'TeamsController')->names('admin.teams');

    Route::group([
        'namespace' => 'Players',
    ], function ()
    {
        Route::resource('/players', 'PlayersController')->names('admin.players');
        Route::resource('/player/role', 'RoleController')->names('admin.player.role');
    });
});
