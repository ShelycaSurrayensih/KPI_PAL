<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\IndhanTimController;
use App\Http\Controllers\IndhanController;
use App\Http\Controllers\IndhanRealisasiController;
use App\Http\Controllers\IndivPlanController;

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('KPI',KPIController::class);
    Route::resource('KPI_IndivPlan',IndivPlanController::class);
    Route::resource('KPI_Indhan',IndhanController::class);
    Route::resource('KPI_IndhanTim',IndhanTimController::class);
    Route::resource('KPI_IndhanRealisasi',IndhanRealisasiController::class);
    
    
    
});
Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');