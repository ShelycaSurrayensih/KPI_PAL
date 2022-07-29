<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KPIController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::middleware(['auth'])->group(function () {
    Route::resource('KPI',KPIController::class);
    
});
//Auth::routes();

Route::get('/create/inisiatifStrategis', [App\Http\Controllers\RKAP::class, 'createInisiatifStrategis'])->name('inisiatifStrategis');
Route::post('/create/inisiatifStrategis/store', [App\Http\Controllers\RKAP::class, 'inisiatifStrategisStore'])->name('inisiatifStrategis.store');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');