<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 

Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


### get emaployee id wise data
Route::get('/get-employee/{id}',[HomeController::class,'getEmployee']);

### update emaployee id wise data
Route::post('/update-employees/{id}',[HomeController::class,'updateEmployees']);

### soft delete emaployee 
Route::delete('/delete-employees/{id}',[HomeController::class,'deleteEmployees']);

### import emaployee 
Route::post('file-import', [HomeController::class, 'fileImport'])->name('file-import');

### export all emaployee 
Route::get('file-export', [HomeController::class, 'fileExport'])->name('file-export');

### send emaployee email view page
Route::get('user-emails', [EmailController::class, 'sendEmailPage']);

Route::post('send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');;



