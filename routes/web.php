<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', '\App\Http\Controllers\NewsController@index');

//Route::resources('news','NewsController');
 Route::get("index","\App\Http\Controllers\NewsController@index");

 Route::get('/landing',function (){
     return view('landing');
 });

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('fillable','App\Http\Controllers\CrudController@getOffers');


Route::group([
    "prefix"=> LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
    function (){
            Route::group(['prefix'=>'offer'],function (){
              //  Route::get('store','\App\Http\Controllers\CrudController@store');

                Route::get('create','\App\Http\Controllers\CrudController@create');

                Route::post('store','\App\Http\Controllers\CrudController@store');

                Route::get('all','\App\Http\Controllers\CrudController@showAllOffers');


            });

    });

Route::group(['prefix'=>'offers'],function () {
    //  Route::get('store','\App\Http\Controllers\CrudController@store');

    Route::get('create', '\App\Http\Controllers\CrudController@create');

    Route::post('store', '\App\Http\Controllers\CrudController@store');
});
