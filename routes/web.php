<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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
    Route::get('view-roles', [RoleController::class, 'view_roles']);
    //CREATE ROLES
    Route::get('create-roles', [RoleController::class, 'create_roles']);
    Route::post('store-roles', [RoleController::class, 'store']);
    //EDIT ROLES
    Route::get('edit-roles/{id}', [RoleController::class, 'edit_roles']);
    Route::post('update-roles/{id}', [RoleController::class, 'update']);
    //DELETE ROLES
    Route::get('delete-roles/{id}', [RoleController::class, 'delete_roles']);
    //END:ROLES

    //BEGIN:PERMISSION
    Route::get('view-permission', [PermissionController::class, 'view_permission']);
    //CREATE PERMISSION
    Route::get('create-permission', [PermissionController::class, 'create_permission']);
    Route::post('store-permission', [PermissionController::class, 'store']);
    //EDIT PERMISSION
    Route::get('edit-permission/{id}', [PermissionController::class, 'edit_permission']);
    Route::post('update-permission/{id}', [PermissionController::class, 'update']);
    //DELETE PERMISSION
    Route::get('delete-permission/{id}', [PermissionController::class, 'delete_permission']);
    //END:PERMISSION

    //BEGIN:INVENTORY
    Route::get('view-permission', [PermissionController::class, 'view_permission']);
    //CREATE INVENTORY
    Route::get('create-permission', [PermissionController::class, 'create_permission']);
    Route::post('store-permission', [PermissionController::class, 'store']);
    //EDIT INVENTORY
    Route::get('edit-permission/{id}', [PermissionController::class, 'edit_permission']);
    Route::post('update-permission/{id}', [PermissionController::class, 'update']);
    //DELETE INVENTORY
    Route::get('delete-permission/{id}', [PermissionController::class, 'delete_permission']);
    //END:INVENTORY
});
