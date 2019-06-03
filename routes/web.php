<?php

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


Route::get('/', 'BattleController@start')->name('start');

Route::get('/battle', 'BattleController@store')->name('battle');

Route::get('/battle/attack', 'BattleController@index')->name('attack');

Route::post('/battle/attack/attack_army2/{id}', 'BattleController@attack_army1')->name('power_army_1');

Route::post('/battle/attack/attack_army1/{id}', 'BattleController@attack_army2')->name('power_army_2');

Route::get('/battle/theend', 'BattleController@theend')->name('theend');

Route::get('/battle/theend/startagain', 'BattleController@destroy')->name('startagain');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
