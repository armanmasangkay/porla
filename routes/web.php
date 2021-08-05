<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\LoginController;
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
Route::get('/', function(){
    return view('base.base-check-view');
});

Route::get('/login',[LoginController::class,'index'])->name('login');

Route::resource('ingredients',IngredientController::class);//->middleware('auth');

Route::get('mobile/stocks/view', function(){
    return view('mobile.pages.ingredients');
});
