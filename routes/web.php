<?php

use App\Http\Controllers\DesempenhoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\UnidadeController;
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

Route::get('/', function () {
    return \App\Unidade::checkBondWithStaff(877);
});
Route::prefix('colaborador')->group(function () {
    Route::get('index', [ColaboradorController::class, 'index'])->name('ColaboradorShow');
    Route::post('store', [ColaboradorController::class, 'store'])->name('ColaboradorStore');
    Route::put('update', [ColaboradorController::class, 'update'])->name('ColaboradorUpdate');
    Route::delete('delete', [ColaboradorController::class, 'destroy'])->name('ColaboradorDelete');
});
Route::prefix('cargo')->group(function () {
    Route::get('index', [CargoController::class, 'index'])->name('CargoShow');
    Route::post('store', [CargoController::class, 'store'])->name('CargoStore');
    Route::put('update', [CargoController::class, 'update'])->name('CargoUpdate');
    Route::delete('delete', [CargoController::class, 'destroy'])->name('CargoDelete');
});
Route::prefix('unidade')->group(function () {
    Route::get('index', [UnidadeController::class, 'index'])->name('UnidadeShow');
    Route::post('store', [UnidadeController::class, 'store'])->name('UnidadeStore');
    Route::put('update', [UnidadeController::class, 'update'])->name('UnidadeUpdate');
    Route::delete('delete', [UnidadeController::class, 'destroy'])->name('UnidadeDelete');
});
Route::prefix('desempenho')->group(function () {
    Route::get('index', [DesempenhoController::class, 'index'])->name('CargoColaboradorShow');
    Route::post('store', [DesempenhoController::class, 'store'])->name('CargoColaboradorStore');
    Route::get('edit/{id}', [DesempenhoController::class, 'edit'])->name('CargoColaboradorEdit');
    Route::put('update', [DesempenhoController::class, 'update'])->name('CargoColaboradorUpdate');
    Route::delete('delete', [DesempenhoController::class, 'destroy'])->name('CargoColaboradorDelete');
    Route::get('create', [DesempenhoController::class, 'create'])->name('UnidadeCreate');
});
Route::prefix('report')->group(function () {
    Route::get('colaboradores', [ColaboradorController::class, 'showReportColaborador'])->name('ReportColaboradorShow');
    Route::get('colaboradorByUnit', [ColaboradorController::class, 'showReportAmountColaboradorByUnit'])->name('ColaboradorByUnit');
    Route::get('rakingColaborador', [ColaboradorController::class, 'reportRakingColaboradoresNote'])->name('rakingColaborador');
});
