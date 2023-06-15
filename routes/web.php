<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Project_controllers\ComicsController as ComicsController;

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

Route::get('/', function()
{
    return view('pages.home');
})->name('home');

Route::resource('/collection', ComicsController::class);
