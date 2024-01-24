<?php

use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('/user')->group(function () {
    Route::get('/', [App\Http\Controllers\ApiUserController::class,'index']);
    Route::post('/create', [App\Http\Controllers\ApiUserController::class,'store']);
    Route::get('/{id}', [App\Http\Controllers\ApiUserController::class,'show']);
    Route::put('/{id}/update',[App\Http\Controllers\ApiUserController::class,'update']);
    Route::delete('/{id}/delete', [App\Http\Controllers\ApiUserController::class,'destroy']);
});

Route::prefix('/product')->group(function () {
    Route::get('/', [App\Http\Controllers\ApiKantinController::class,'index']);
    Route::post('/create', [App\Http\Controllers\ApiKantinController::class,'store']);
    Route::get('/{id}', [App\Http\Controllers\ApiKantinController::class,'show']);
    Route::put('/{id}/update',[App\Http\Controllers\ApiKantinController::class,'update']);
    Route::delete('/{id}/delete', [App\Http\Controllers\ApiKantinController::class,'destroy']);
});


Route::prefix('/bank')->group(function () {
    Route::get('/transaction', [App\Http\Controllers\ApiBankController::class,'index']);
    Route::get('/topup', [App\Http\Controllers\ApiBankController::class,'topup']);
    Route::post('/topupconfirm', [App\Http\Controllers\ApiBankController::class,'topupconfirm']);
    Route::post('/topupreject', [App\Http\Controllers\ApiBankController::class,'topupreject']);
    Route::get('/transaction/{id}', [App\Http\Controllers\ApiBankController::class,'show']);
    Route::get('/wallets', [App\Http\Controllers\ApiBankController::class,'wallets']);
    Route::get('/wallet/{id}', [App\Http\Controllers\ApiBankController::class,'walletshow']);
});
