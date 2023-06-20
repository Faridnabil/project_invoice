<?php

use App\Http\Controllers\QuotationController;
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

    Route::get('/beritaacara', function () {
        return view('berita-acara.view-berita');
    });

    Route::get('/beritaacaraprint', function () {
        return view('berita-acara.beritaprint');
    });
});

Route::middleware(['auth', 'role:Administrator'])->group(function () {
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

    Route::get('view-spk', [SPKController::class, 'index'])->name('view-spk');
    Route::get('create-spk', [SPKController::class, 'show'])->name('create-spk');
    Route::post('store-spk', [SPKController::class, 'store']);
});
