<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CompanyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth endpoints
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// File endpoints
Route::post('/upload-file', [FileController::class, 'upload'])->middleware('auth')->name('upload');
Route::get('/get-files', [FileController::class, 'getAllFiles'])->middleware('auth')->name('getAllFiles');
Route::get('/get-files-admin', [FileController::class, 'JustGetAllFiles'])/*->middleware('auth')*/->name('JustGetAllFiles');
Route::delete('/delete-file/{id}', [FileController::class, 'deleteFile'])->middleware('auth')->name('deleteFile');
Route::get('/download-file/{id}', [FileController::class, 'downloadFile'])->middleware('auth')->name('downloadFile');
Route::get('/view-file/{id}', [FileController::class, 'viewFile'])->middleware('auth')->name('viewFile');
Route::put('/update-comment/{id}', [FileController::class, 'updateComment'])->name('updateComment');

// Make Route::update('/update-file/{id}', [FileController::class, 'updateFile'])->name('updateFile');

// Mail endpoints
//Route::get('/send-email', [MailController::class, 'sendEmail'])->name('sendEmail');


Route::middleware('auth:sanctum')->get('/user', [UserController::class,'getUserData']);
Route::put('/loaduser', [UserController::class, 'getUserData'])->name('updateComment');

// Company endpoints
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies-with-info', [CompanyController::class, 'getWithAddress']);