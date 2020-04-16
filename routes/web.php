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

Route::get("/", "ActionsController@index")->middleware("auth")->name("mainPage");
Route::post("/", "ActionsController@store");
Route::get("/{id}/edit", "ActionsController@edit")->name("edit");
Route::put("/update/{id}", "ActionsController@update")->name("update");
Route::get("/delete/{id}", "ActionsController@destroy")->name("delete");

Auth::routes();
