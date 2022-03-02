<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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


//Route::get('/Categories','CategoriesController@index');

Route::get('/Categories',[CategoriesController::class, 'index']);

Route::resource('categoria', CategoriesController::class);


Route::get('/borrar',[CategoriesController::class, 'select']);