<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','WelcomeController@index')->name('welcome');


Route::get('showPokemon/{id}','PokemonController@show')->name('showPokemon');


Route::get('admin/pokemons','PokemonController@index')->name('pokemon');
Route::get('admin/pokemon/add','PokemonController@create')->name('addPokemon');
Route::post('admin/pokemon/save','PokemonController@store')->name('savePokemon');
Route::get('admin/pokemon/edit/{id}','PokemonController@edit')->name('editPokemon');
Route::post('admin/pokemon/update/{id}','PokemonController@update')->name('updatePokemon');
Route::get('admin/pokemon/delete/{id}','PokemonController@destroy')->name('deletePokemon');
Route::get('pokemon/adopt/{idPokeball}/{idPokemon}','MyPokemonController@adopt')->name('adopt');
Route::get('pokemon/release/{id}','MyPokemonController@release')->name('release');


Route::get('showType/{id}','TypeController@show')->name('showType');
Route::get('admin/type','TypeController@index')->name('type');
Route::get('admin/type/add','TypeController@create')->name('addType');
Route::post('admin/type/save','TypeController@store')->name('saveType');
Route::get('admin/type/edit/{id}','TypeController@edit')->name('editType');
Route::post('admin/type/update/{id}','TypeController@update')->name('updateType');
Route::get('admin/type/delete/{id}','TypeController@destroy')->name('deleteType');

Route::get('showGenre/{id}','GenreController@show')->name('showGenre');
Route::get('admin/genre','GenreController@index')->name('genre');
Route::get('admin/genre/add','GenreController@create')->name('addGenre');
Route::post('admin/genre/save','GenreController@store')->name('saveGenre');
Route::get('admin/genre/edit/{id}','GenreController@edit')->name('editGenre');
Route::post('admin/genre/update/{id}','GenreController@update')->name('updateGenre');
Route::get('admin/genre/delete/{id}','GenreController@destroy')->name('deleteGenre');


Auth::routes();


Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/buyPokeball/{id}','ProfileController@buy')->name('buy');
Route::get('/rechargeCredits','ProfileController@recharge')->name('recharge');