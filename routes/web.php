<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndivController;
use App\Http\Controllers\IndivRealisasiController;
use App\Http\Controllers\IndhanTimController;
use App\Http\Controllers\IndhanController;
use App\Http\Controllers\IndhanRealisasiController;
use App\Http\Controllers\TupoksiDepartemenController;
use App\Http\Controllers\TupoksiKPIController;
use App\Http\Controllers\TupoksiProkerController;
use App\Http\Controllers\TupoksiRealisasiController;
use App\Http\Controllers\TwController;
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
    Route::resource('KPI_IndivRealisasi',IndivRealisasiController::class);
    Route::resource('KPI_Indhan',IndhanController::class);
    Route::resource('KPI_IndhanTim',IndhanTimController::class);
    Route::resource('KPI_IndhanRealisasi',IndhanRealisasiController::class);
    Route::resource('KPI_TupoksiDepartemen',TupoksiDepartemenController::class);
    Route::resource('KPI_TupoksiKpi',TupoksiKPIController::class);
    Route::resource('KPI_TupoksiProker',TupoksiProkerController::class);
    Route::resource('KPI_TupoksiRealisasi',TupoksiRealisasiController::class);
    Route::resource('KPI_TupoksiTw',TwController::class);
    
    
});
Auth::routes();

//Cascading Index
Route::get('/Cascade/KPI', [App\Http\Controllers\CascadeController::class, 'cascadeKpiIndex'])->name('cascadeKPI.index');
Route::post('/Cascade/KPI/store', [App\Http\Controllers\CascadeController::class, 'cascadeKpiStore'])->name('cascadeKPI.store');
Route::post('/Cascade/KPI/update/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiUpdate'])->name('cascadeKPI.update');

//Cascading KPI Divisi
Route::get('/Cascade/KPIDiv/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivIndex'])->name('casDiv.index');
Route::post('/Cascade/KPIDiv/store', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivStore'])->name('casDiv.store');
Route::post('/Cascade/KPIDiv/update/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivUpdate'])->name('casDiv.update');

//Cascading Proker
Route::get('/Cascade/Proker/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeProkerIndex'])->name('cascadeProker.index');
Route::post('/Cascade/Proker/store', [App\Http\Controllers\CascadeController::class, 'cascadeProkerStore'])->name('cascadeProker.store');
Route::post('/Cascade/Proker/update/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeProkerUpdate'])->name('cascadeProker.update');

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
Route::get('/Overview', [App\Http\Controllers\RKAP::class, 'overviewIndex'])->name('overview.index');

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

//Indhan
Route::post('/KPI_IndhanTim/update/{id}',[IndhanTimController::class, 'update'])->name('indhanTim.update');
Route::post('/KPI_IndhanTim/edit/{id}',[IndhanTimController::class, 'edit'])->name('indhanTim.edit');
Route::delete('/KPI_IndhanTim/destroy/{id}',[IndhanTimController::class, 'destroy'])->name('indhanTim.destroy');

Route::post('/KPI_Indiv/update/{id}',[IndivController::class, 'update'])->name('kpidir.update');
Route::post('/KPI_Indiv/edit/{id}',[IndivController::class, 'edit'])->name('kpidir.edit');
Route::delete('/KPI_Indiv/destroy/{id}',[IndivController::class, 'destroy'])->name('kpidir.destroy');

Route::get('/KPI_Indiv/Realisasi/{id}', [IndivController::class, 'realisasiIndex'])->name('realisasi.index');
Route::get('/KPI_IndivRealisasi/{id}', [IndivRealisasiController::class, 'index'])->name('indivReal.index');
Route::post('/KPI_IndivRealisasi/update/{id}',[IndivRealisasiController::class, 'update'])->name('indivReal.update');
Route::post('/KPI_IndivRealisasi/edit/{id}',[IndivRealisasiController::class, 'edit'])->name('indivReal.edit');
Route::delete('/KPI_IndivRealisasi/destroy/{id}',[IndivRealisasiController::class, 'destroy'])->name('indivReal.destroy');

Route::get('/KPI_Indhan/Realisasi/{id}', [IndhanController::class, 'indhanRealisasiIndex'])->name('indhanRealisasi.index');
Route::post('/KPI_Indhan/update/{id}',[IndhanController::class, 'update'])->name('indhan.update');
Route::post('/KPI_Indhan/edit/{id}',[IndhanController::class, 'edit'])->name('indhan.edit');
Route::delete('/KPI_Indhan/destroy/{id}',[IndhanController::class, 'destroy'])->name('indhan.destroy');

Route::post('/KPI_IndhanRealisasi/update/{id}',[IndhanRealisasiController::class, 'update'])->name('indhanReal.update');
Route::post('/KPI_IndhanRealisasi/edit/{id}',[IndhanRealisasiController::class, 'edit'])->name('indhanReal.edit');
Route::delete('/KPI_IndhanRealisasi/destroy/{id}',[IndhanRealisasiController::class, 'destroy'])->name('indhanReal.destroy');

//tupoksi departemen
Route::delete('/Tupoksi_Departemen/destroy/{id}',[TupoksiDepartemenController::class, 'destroy'])->name('tupoksiDepartemen.destroy');
Route::post('/Tupoksi_Departemen/update/{id}',[TupoksiDepartemenController::class, 'update'])->name('tupoksiDepartemen.update');

//tupoksi KPI
Route::delete('/Tupoksi_Kpi/destroy/{id}',[TupoksiKPIController::class, 'destroy'])->name('tupoksiKpi.destroy');
Route::post('/Tupoksi_Kpi/update/{id}',[TupoksiKPIController::class, 'update'])->name('tupoksiKpi.update');

//tupoksi Proker
Route::delete('/Tupoksi_Proker/destroy/{id}',[TupoksiProkerController::class, 'destroy'])->name('tupoksiProker.destroy');
Route::post('/Tupoksi_Proker/update/{id}',[TupoksiProkerController::class, 'update'])->name('tupoksiProker.update');

//tupoksi Realisasi
Route::post('/KPI_TupoksiRealisasi/update/{id}',[TupoksiRealisasiController::class, 'update'])->name('realisasi.update');
Route::post('/KPI_TupoksiRealisasi/edit/{id}',[TupoksiRealisasiController::class, 'edit'])->name('realisasi.edit');
Route::delete('/KPI_TupoksiRealisasi/destroy/{id}',[TupoksiRealisasiController::class, 'destroy'])->name('realisasi.destroy');


//tupoksi Tw
Route::post('/Tupoksi_Tw/update/{id}',[TwController::class, 'update'])->name('tupoksiTw.update');
Route::delete('/Tupoksi_Tw/destroy/{id}',[TwController::class, 'destroy'])->name('tupoksiTw.destroy');
Route::get('/Tupoksi_Tw/index/{id}',[TwController::class, 'index'])->name('tupoksiTw.index');

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');