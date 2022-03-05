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




Route::get('/Categories',[CategoriesController::class, 'index']);

//Route::patch('categoriar/{id}', [CategoriesController::class, 'update'])->name('patch');

Route::resource('categoria', CategoriesController::class);
Route::patch('categoria', [App\Http\Controllers\HomeController::class, 'update']);

//Route::patch('categoriaPatch', [CategoriesController::class, 'update']);



Route::get('/list',[CategoriesController::class, 'listado']);



Route::get('/borrar',[CategoriesController::class, 'select']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
