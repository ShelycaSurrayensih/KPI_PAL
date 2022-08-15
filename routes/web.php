<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndivController;
use App\Http\Controllers\IndhanTimController;
use App\Http\Controllers\IndhanController;
use App\Http\Controllers\IndhanRealisasiController;
use App\Http\Controllers\IndivPlanController;
use App\Http\Controllers\RKAP;

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
    Route::resource('KPI_Indiv',IndivController::class);
    Route::resource('KPI_IndivPlan',IndivPlanController::class);
    Route::resource('KPI_Indhan',IndhanController::class);
    Route::resource('KPI_IndhanTim',IndhanTimController::class);
    Route::resource('KPI_IndhanRealisasi',IndhanRealisasiController::class);
    
    
    
});
Auth::routes();

//RKAP Store
Route::post('/inisiatifStrategis/store', [App\Http\Controllers\RKAP::class, 'inisiatifStrategisStore'])->name('inisiatifStrategis.store');
Route::post('/KategoriPMS/store', [App\Http\Controllers\RKAP::class, 'KategoriPmsStore'])->name('KategoriPms.store');
Route::post('/KPI_PMS/store', [App\Http\Controllers\RKAP::class, 'kpi_pmsStore'])->name('kpi_pms.store');
Route::post('/Plan_PMS/store', [App\Http\Controllers\RKAP::class, 'plan_pmsStore'])->name('planpms.store');
Route::post('/Realisasi_PMS/store', [App\Http\Controllers\RKAP::class, 'real_pmsStore'])->name('realpms.store');

//RKAP Index
Route::get('/InisiatifStrategis', [App\Http\Controllers\RKAP::class, 'inisiatifStrategisIndex'])->name('inisiatifStrategis.index');
Route::get('/KategoriPMS', [App\Http\Controllers\RKAP::class, 'KategoriPmsIndex'])->name('KategoriPms.index');
Route::get('/KPI_PMS', [App\Http\Controllers\RKAP::class, 'kpi_pmsIndex'])->name('kpi_pms.index');
Route::get('/Plan_PMS/{id_kpipms}', [App\Http\Controllers\RKAP::class, 'plan_pmsIndex'])->name('planpms.index');
Route::get('/Realisasi_PMS/{id_kpipms}', [App\Http\Controllers\RKAP::class, 'real_pmsIndex'])->name('realpms.index');

//RKAP Update
Route::post('/inisiatifStrategis/update/{id}', [App\Http\Controllers\RKAP::class, 'inisiatifStrategisUpdate'])->name('inisiatifStrategis.update');
Route::post('/KategoriPMS/update/{id}', [App\Http\Controllers\RKAP::class, 'KategoriPmsUpdate'])->name('KategoriPms.update');
Route::post('/KPI_PMS/update/{id}', [App\Http\Controllers\RKAP::class, 'kpi_pmsUpdate'])->name('kpi_pms.update');
Route::post('/Plan_PMS/update/{id}', [App\Http\Controllers\RKAP::class, 'plan_pmsUpdate'])->name('planpms.update');
Route::post('/Realisasi_PMS/update/{id}', [App\Http\Controllers\RKAP::class, 'real_pmsUpdate'])->name('realpms.update');

//RKAP Delete
Route::delete('/InisiatifStrategis/delete/{id}',[RKAP::class, 'inisiatifStrategisDelete'])->name('inisiatifStrategis.destroy');
Route::delete('/KategoriPMS/delete/{id}',[RKAP::class, 'KategoriPmsDelete'])->name('KategoriPms.destroy');
Route::delete('/KPI_PMS/delete/{id}',[RKAP::class, 'kpi_pmsDelete'])->name('kpi_pms.destroy');
Route::delete('/Plan_PMS/delete/{id}',[RKAP::class, 'plan_pmsDelete'])->name('planpms.destroy');
Route::delete('/Realisasi_PMS/destroy/{id}',[RKAP::class, 'real_pmsDestroy'])->name('realpms.destroy');

Route::post('/KPI_IndhanTim/update/{id}',[IndhanTimController::class, 'update'])->name('indhanTim.update');
Route::post('/KPI_IndhanTim/edit/{id}',[IndhanTimController::class, 'edit'])->name('indhanTim.edit');
Route::delete('/KPI_IndhanTim/destroy/{id}',[IndhanTimController::class, 'destroy'])->name('indhanTim.destroy');

Route::post('/KPI_Indiv/update/{id}',[IndivController::class, 'update'])->name('kpidir.update');
Route::post('/KPI_Indiv/edit/{id}',[IndivController::class, 'edit'])->name('kpidir.edit');
Route::delete('/KPI_Indiv/destroy/{id}',[IndivController::class, 'destroy'])->name('kpidir.destroy');

Route::post('/KPI_IndivPlan/update/{id}',[IndivPlanController::class, 'update'])->name('plan.update');
Route::post('/KPI_IndivPlan/edit/{id}',[IndivPlanController::class, 'edit'])->name('plan.edit');
Route::delete('/KPI_IndivPlan/destroy/{id}',[IndivPlanController::class, 'destroy'])->name('plan.destroy');

Route::post('/KPI_Indhan/update/{id}',[IndhanController::class, 'update'])->name('indhan.update');
Route::post('/KPI_Indhan/edit/{id}',[IndhanController::class, 'edit'])->name('indhan.edit');
Route::delete('/KPI_Indhan/destroy/{id}',[IndhanController::class, 'destroy'])->name('indhan.destroy');

Route::post('/KPI_IndhanRealisasi/update/{id}',[IndhanRealisasiController::class, 'update'])->name('indhanReal.update');
Route::post('/KPI_IndhanRealisasi/edit/{id}',[IndhanRealisasiController::class, 'edit'])->name('indhanReal.edit');
Route::delete('/KPI_IndhanRealisasi/destroy/{id}',[IndhanRealisasiController::class, 'destroy'])->name('indhanReal.destroy');



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');