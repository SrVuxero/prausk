
<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndexController::class,'index'])->name('home');
Route::post('/',[IndexController::class,'auth'])->name('auth');
Route::get('/cart',[TransactionController::class,'index'])->name('cart.index');
Route::get('/cart/receipt',[TransactionController::class,'receipt'])->name('cart.receipt');
Route::get('/cart/receipt/take',[TransactionController::class,'cart_take'])->name('cart.take');
Route::post('/cart',[TransactionController::class,'sentToCart'])->name('cart.proceed');
Route::put('/cart',[TransactionController::class,'payCart'])->name('cart.pay');
Route::delete('/cart',[TransactionController::class,'cart_delete'])->name('cart.delete');
Route::get('/topup',[TransactionController::class,'topUpIndex'])->name('topup.index');
Route::post('/topup',[TransactionController::class,'topUp'])->name('topup.proceed');
Route::post('/logout',[IndexController::class,'logout'])->name('logout');

Route::prefix('/bank')->group(function () {
    Route::get('/',[BankController::class,'index'])->name('bank');
    Route::get('/request-topup',[BankController::class,'topuprequest'])->name('topuprequest');
    Route::put('/request-topup',[BankController::class,'topupreqproceed'])->name('topuprequest.proceed');
    Route::get('/login',[BankController::class,'loginindex'])->name('login.bank');
    Route::post('/login',[BankController::class,'loginproceed'])->name('login.bank.proceed');
    Route::get('/logout',[BankController::class,'logout'])->name('logout.bank');
});


Route::prefix('kantin')->group(function(){
   Route::get('/',[KantinController::class,'index'])->name('kantin.index');
   Route::get('/tambahproduct',[KantinController::class,'addproductindex'])->name('kantin.addproduct');
   Route::post('/tambahproduct',[KantinController::class,'addproductpost'])->name('kantin.addproduct.post');
   Route::delete('/tambahproduct/delete',[KantinController::class,'productdelete'])->name('kantin.addproduct.delete');
   Route::put('/tambahproduct/update',[KantinController::class,'productupdate'])->name('kantin.product.update');
   Route::get('/login',[KantinController::class,'login'])->name('kantin.login.index');
   Route::post('/login',[KantinController::class,'loginproceed'])->name('kantin.login.proceed');
   Route::get('/logout',[KantinController::class,'logout'])->name('kantin.logout');
});
