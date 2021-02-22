<?php

use App\Http\Controllers\PerfilController;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'InicioController@index')->name('inicio.index');

Route::get('/recetas', 'RecetaController@index')->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create')->name('recetas.create');
Route::post('/recetas', 'RecetaController@store')->name('recetas.store');
Route::get('/recetas/{receta}', 'RecetaController@show')->name('recetas.show');
Route::get('/recetas/{receta}/edit', 'Recetacontroller@edit')->name('recetas.edit');
Route::put('/recetas/{receta}', 'RecetaController@update')->name('receta.update');
Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('receta.destroy');

Route::get('/perfiles/{perfil}', 'PerfilController@show')->name('perfiles.show');
Route::get('/perfiles/{perfil}/edit', 'PerfilController@edit')->name('perfiles.edit');
Route::put('/perfiles/{perfil}', 'PerfilController@update')->name('perfiles.update');

//buscador de receta
Route::get('/buscar', 'RecetaController@search')->name('buscar.show');

//almacernar likes_receta
Route::post('/recetas/{receta}', 'LikesController@update')->name('likes.update');

//mostrar por categoria
Route::get('/categoria/{categoriaReceta}', 'CategoriasController@show')->name('categorias.show');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
