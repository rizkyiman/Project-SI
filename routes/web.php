<?php

use App\Http\Controllers\EksportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetikemasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TruckingController;
use App\Http\Controllers\WarehouseingController;
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

Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

//petikemas
Route::get('/petikemas' ,[PetikemasController::class, "index"])->name('petikemas');
Route::post('/petikemas' ,[PetikemasController::class, "store"])->name('store.petikemas');
Route::put('/petikemas' ,[PetikemasController::class, "update"])->name('update.petikemas');
Route::get('/petikemas/{id}' ,[PetikemasController::class, "delete"])->name('delete.petikemas');

//eksport
Route::get('/eksport' ,[EksportController::class, "index"])->name('eksport');
Route::post('/eksport' ,[EksportController::class, "store"])->name('store.eksport');
Route::put('/eksport/{id}' ,[EksportController::class, "update"])->name('update.eksportt');
Route::get('/eksport/{id}' ,[EksportController::class, "delete"])->name('delete.eksportt');

//import
Route::get('/import' ,[ImportController::class, "index"])->name('import');
Route::post('/import' ,[ImportController::class, "store"])->name('store.import');
Route::put('/import/{id}' ,[ImportController::class, "update"])->name('update.import');
Route::get('/import/{id}' ,[ImportController::class, "delete"])->name('delete.import');

//pergudangan
Route::get('/warehouseing' ,[WarehouseingController::class, "index"])->name('warehouseing');
Route::post('/warehouseing' ,[WarehouseingController::class, "store"])->name('store.warehouseing');
Route::put('/warehouseing/{id}',[WarehouseingController::class, "update"])->name('update.warehouseing');
Route::get('/warehouseing/{id}',[WarehouseingController::class, "delete"])->name('delete.warehouseing');

//history
Route::get('/history' ,[HistoryController::class, "index"])->name('history');
Route::post('/history' ,[HistoryController::class, "store"])->name('store.history');
Route::put('/history/{id}' ,[HistoryController::class, "update"])->name('update.history');
Route::get('/history/{id}' ,[HistoryController::class, "delete"])->name('delete.history');
Route::get('/history}' ,[HistoryController::class, "print"])->name('print.history');

//shipping
Route::get('/shipping' ,[ShippingController::class, "index"])->name('shipping');
Route::post('/shipping' ,[ShippingController::class, "store"])->name('store.shipping');
Route::put('/shipping/update/{id}' ,[ShippingController::class, "update"])->name('update.shipping');
Route::get('/shipping/delete/{id}' ,[ShippingController::class, "delete"])->name('delete.shipping');
Route::get('/shipping/print}' ,[ShippingController::class, "print"])->name('print.shipping');

//trucking
Route::get('/trucking' ,[TruckingController::class, "index"])->name('trucking');
Route::post('/trucking' ,[TruckingController::class, "store"])->name('store.trucking');
Route::put('/trucking/update/{id}' ,[TruckingController::class, "update"])->name('update.trucking');
Route::get('/trucking/delete/{id}' ,[TruckingController::class, "delete"])->name('delete.trucking');
Route::get('/trucking/print' ,[TruckingController::class, "print"])->name('print.truck');

//register
Route::get('/Register' ,[RegisterController::class, "index"])->name('sign-up');

//login
Route::get('/' ,[LoginController::class, "index"])->name('sign-in');

//profile
Route::get('/profile' ,[ProfileController::class, "index"])->name('profile');
Route::post('/profile' ,[ProfileController::class, "store"])->name('store.profile');
Route::get('/profile/{id}' ,[ProfileController::class, "delete"])->name('delete.profile');

//role
Route::get('/role' ,[RoleController::class, "index"])->name('role');
Route::post('/role' ,[RoleController::class, "store"])->name('store.role');
Route::put('/role' ,[RoleController::class, "update"])->name('update.role');
Route::get('/role/{id}' ,[RoleController::class, "delete"])->name('delete.role');