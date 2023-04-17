<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AuthController;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/create', [PatientController::class, 'create']);
Route::post('/logout', [PatientController::class, 'logout']);
Route::group(['middleware' => ['auth:sanctum']], function () {   
    Route::get('/patients', [PatientController::class,'index']);
    Route::get('/show', [PatientController::class, 'show']);
    Route::delete('/delete/{id}', [PatientController::class, 'delete']);
    Route::put('/update/{id}', [PatientController::class, 'update']);  
});

//Role Route 
Route::get('/getRoles', [RoleController::class, 'index']);
Route::post('/createRoles', [RoleController::class, 'createRoles']);

//Permission Route
Route::get('/getPermission', [PermissionController::class, 'index']);
Route::get('/getPermission', [RoleController::class, 'getPermission']);
Route::post('/createPermission', [PermissionController::class, 'create']);

//async roles and permissions
Route::get('/getRolePermission', [RoleController::class, 'getRolePermission']);
Route::post('/deleteRoles/{id}', [RoleController::class, 'destroy']);
Route::put('/updatePermissions/{id}', [RoleController::class, 'updatePermissions']);
Route::get('/store', [PermissionController::class, 'store']);