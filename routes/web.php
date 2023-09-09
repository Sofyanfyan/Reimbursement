<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\StaffController;
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

Route::post('actionlogin', [AuthController::class, 'postLogin'])->name('actionlogin');;
Route::get('/', [AuthController::class, 'login']);


Route::middleware(['check-direktur'])->group( function() {
   
   Route::prefix('dasboard-direktur')->group(function(){
      Route::get('', [DirekturController::class, 'index']);
      Route::get('/users', [DirekturController::class, 'getUser']);
      Route::get('/users/update/{nip}', [DirekturController::class, 'update']);
      Route::put('/users/update/{nip}', [DirekturController::class, 'updateUser']);
      Route::get('/list', [DirekturController::class, 'list']);
      Route::get('/list/{id}', [DirekturController::class, 'detail']);
      Route::get('/list/{id}/{status}', [DirekturController::class, 'updateRem']);
   });
   Route::post('dasboard-direktur-create', [DirekturController::class, 'createUser'])->name('dasboard-direktur-create');
   Route::resource('dasboard-direktur-users-delete', DirekturController::class);
});

Route::middleware(['check-finance'])->group( function() {

   Route::prefix('dasboard-finance')->group(function () {

      Route::get('/', [FinanceController::class, 'index']);
      Route::get('/{id}', [FinanceController::class, 'detail']);
      Route::get('/{id}/{status}', [FinanceController::class, 'update']);
   });
});


Route::middleware(['check-staff'])->group( function() {

   Route::prefix('dasboard-staff')->group(function () {

      Route::get('/', [StaffController::class, 'index']);
      
   });
   Route::post('create-task', [StaffController::class, 'create'])->name('create-task');
});

Route::get('/logout', [AuthController::class, 'logout']);