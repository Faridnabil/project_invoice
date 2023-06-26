<?php

use App\Http\Controllers\BASTController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('menu.home');
    });
});

Route::middleware(['auth', 'role:Administrator'])->group(function () {

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);

    //BEGIN:USER
    Route::get('view-user', [UserController::class, 'view_user']);
    //CREATE USER
    Route::get('create-user', [UserController::class, 'create_user']);
    Route::post('store-user', [UserController::class, 'store']);
    //EDIT USER
    Route::get('edit-user/{id}', [UserController::class, 'edit_user']);
    Route::post('update-user/{id}', [UserController::class, 'update']);
    //DELETE USER
    Route::get('delete-user/{id}', [UserController::class, 'delete_user']);
    //END:USER

    //BEGIN:ROLES
    Route::get('view-quotation', [QuotationController::class, 'view_quotation']);
    //CREATE ROLES
    Route::get('create-quotation', [QuotationController::class, 'create_quotation']);
    Route::post('store-quotation', [QuotationController::class, 'store_quotation']);
    //EDIT ROLES
    Route::get('edit-quotation/{id}', [QuotationController::class, 'edit_quotation']);
    Route::post('update-quotation/{id}', [QuotationController::class, 'update_quotation']);
    //DELETE ROLES
    Route::get('delete-quotation/{id}', [QuotationController::class, 'delete_quotation']);
    //END:ROLES

    //SPK
    Route::get('view-spk', [SPKController::class, 'index'])->name('view-spk');
    Route::get('create-spk', [SPKController::class, 'show'])->name('create-spk');
    Route::post('store-spk', [SPKController::class, 'store']);
    Route::get('edit-spk/{id}', [SPKController::class, 'showEdit']);
    Route::post('update-spk/{id}', [SPKController::class, 'update']);
    Route::get('delete-spk/{id}', [SPKController::class, 'destroy']);
    Route::get('print-spk/{id}', [SPKController::class, 'pdf']);


    //BERITA ACARA SERAH TERIMA
    Route::get('view-bast', [BASTController::class, 'index'])->name('view-bast');
    Route::get('create-bast', [BASTController::class, 'show'])->name('create-bast');
    Route::post('store-bast', [BASTController::class, 'store']);
    Route::get('print-bast', [BASTController::class, 'pdf'])->name('print-bast');

    //INVOICE
    Route::get('view-invoice', [InvoiceController::class, 'view_invoice'])->name('view-invoice');

});

Route::get('/', function () {
    return view('welcome');
});
