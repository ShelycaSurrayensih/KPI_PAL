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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Exports\ExportExcel;
use App\Http\Controllers\ChartJsController;
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

//excel cascade
Route::get('/Print-All-Dokumen', [App\Http\Controllers\HomeController::class, 'print'])->name('print');
Route::get('/CasTw1', [App\Http\Controllers\HomeController::class, 'CasTw1'])->name('cas.CasTw1');
Route::get('/CasTw2', [App\Http\Controllers\HomeController::class, 'CasTw2'])->name('cas.CasTw2');
Route::get('/CasTw3', [App\Http\Controllers\HomeController::class, 'CasTw3'])->name('cas.CasTw3');
Route::get('/CasTw4', [App\Http\Controllers\HomeController::class, 'CasTw4'])->name('cas.CasTw4');


//excel tupoksi
Route::get('/TupTw1', [App\Http\Controllers\HomeController::class, 'TupTw1'])->name('tup.TupTw1');
Route::get('/TupTw2', [App\Http\Controllers\HomeController::class, 'TupTw2'])->name('tup.TupTw2');
Route::get('/TupTw3', [App\Http\Controllers\HomeController::class, 'TupTw3'])->name('tup.TupTw3');
Route::get('/TupTw4', [App\Http\Controllers\HomeController::class, 'TupTw4'])->name('tup.TupTw4');


//Cascading Index
Route::get('/Cascade/KPI', [App\Http\Controllers\CascadeController::class, 'cascadeKpiIndex'])->name('cascadeKPI.index');
Route::post('/Cascade/KPI/store', [App\Http\Controllers\CascadeController::class, 'cascadeKpiStore'])->name('cascadeKPI.store');
Route::post('/Cascade/KPI/update/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiUpdate'])->name('cascadeKPI.update');
Route::get('/Cascade/KPI/delete/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDelete'])->name('cascadeKPI.delete');

//Cascading KPI Divisi
Route::get('/Cascade/KPIDiv/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivIndex'])->name('casDiv.index');
Route::get('/Cascade/KPIDiv', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivAll'])->name('casDiv.all');
Route::post('/Cascade/KPIDiv/store', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivStore'])->name('casDiv.store');
Route::post('/Cascade/KPIDiv/update/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivUpdate'])->name('casDiv.update');
Route::get('/Cascade/KPIDiv/delete/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeKpiDivDelete'])->name('casDiv.delete');

//Query KPI Divisi
Route::get('/Cascade/KPIDiv/KPI/{id}', [App\Http\Controllers\CascadeController::class, 'kpiDivList'])->name('kpiDiv.list');


//Cascading Proker
Route::get('/Cascade/Proker/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeProkerIndex'])->name('cascadeProker.index');
Route::post('/Cascade/Proker/store', [App\Http\Controllers\CascadeController::class, 'cascadeProkerStore'])->name('cascadeProker.store');
Route::post('/Cascade/Proker/update/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeProkerUpdate'])->name('cascadeProker.update');

//Cascading Realisasi
Route::post('/Cascade/Realisas/store', [App\Http\Controllers\CascadeController::class, 'cascadeRealisStore'])->name('cascadeRealis.store');
Route::post('/Cascade/Realisas/update/{id}', [App\Http\Controllers\CascadeController::class, 'cascadeRealisUpdate'])->name('cascadeRealis.update');

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
Route::get('/Tupoksi_Proker/index/{id}',[TupoksiProkerController::class, 'indexProker'])->name('tupoksiProker.index');
Route::get('/Tupoksi_Proker/index',[TupoksiProkerController::class, 'index'])->name('tupoksiProkerAll.index');

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

 //Change Password dan User Profile
Route::get('/user/password',[ChangePasswordController::class,'CPassword'])->name('change.password');
Route::post('/password/update',[ChangePasswordController::class,'UpdatePassword'])->name('password.update');
Route::get('/Profile/index',[ProfileController::class, 'index'])->name('profile.index');


//Delete Comment
Route::get('/Cascade/KPI/commentDelete/{id}', [App\Http\Controllers\CascadeController::class, 'deleteComment'])->name('cascade.delComment');
Route::get('/KPI_Indhan/Realisasi/commentDelete/{id}', [App\Http\Controllers\IndhanRealisasiController::class, 'deleteComment'])->name('indhanReal.delComment');
Route::get('/KPI_Indiv/Realisasi/commentDelete/{id}', [App\Http\Controllers\IndivRealisasiController::class, 'deleteComment'])->name('indivReal.delComment');
Route::get('/Plan_PMS/commentDelete/{id}', [App\Http\Controllers\RKAP::class, 'deleteComment'])->name('planpms.delComment');
Route::get('/Tupoksi/commentDelete/{id}', [App\Http\Controllers\TupoksiRealisasiController::class, 'deleteComment'])->name('tupoksi.delComment');

//view document
Route::get('/view/RKAP/{filename}', [App\Http\Controllers\RKAP::class, 'view'])->name('viewFile');
Route::get('/view/Cascade/{filename}', [App\Http\Controllers\CascadeController::class, 'view'])->name('viewFile.cascade');
Route::get('/view/Tupoksi/{filename}', [App\Http\Controllers\TwController::class, 'view'])->name('viewFile.tupoksi');
Route::get('/view/Indiv/{filename}', [App\Http\Controllers\IndivRealisasiController::class, 'view'])->name('viewFile.indiv');
Route::get('/view/Indhan/{filename}', [App\Http\Controllers\IndhanRealisasiController::class, 'view'])->name('viewFile.indhan');

// //view document
// Route::get('/download/RKAP/{filename}', [App\Http\Controllers\RKAP::class, 'download'])->name('viewFile');
Route::get('/download/Cascade/{filename}', [App\Http\Controllers\CascadeController::class, 'download'])->name('downloadFile.cascade');
Route::get('/download/Tupoksi/{filename}', [App\Http\Controllers\TwController::class, 'download'])->name('downloadFile.tupoksi');
Route::get('/download/Indiv/{filename}', [App\Http\Controllers\IndivRealisasiController::class, 'download'])->name('downloadFile.indiv');
Route::get('/download/Indhan/{filename}', [App\Http\Controllers\IndhanRealisasiController::class, 'download'])->name('downloadFile.indhan');


Route::get('chartjs', [ChartJsController::class, 'index'])->name('chartjs.index');
