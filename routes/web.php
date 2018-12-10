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

Route::get('/', function () {
    dump(new \App\Report\CourseReport( Carbon\Carbon::now()->subDays(29),  Carbon\Carbon::now()));
    return view('welcome');
});
