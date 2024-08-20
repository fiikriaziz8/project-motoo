<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReviewAppController;

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

Route::get('/login', function(){
    return view('login', [
        'page' => 'Login Page',
    ]);
})->name('loginpage')->middleware('guest');

Route::post('/login', [UserController::class, 'authenticate'])->name('login');

Route::get('/register',function(){
    return view('register',[
        'page' => 'register'
    ]);
})->middleware('guest');
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', [ApplicationController::class, 'getApplication'])->name('home');
Route::get('/home', [ApplicationController::class, 'getApplication']);

Route::get('/detail/{x}', [ApplicationController::class, 'appDetails']);

Route::get('/store', [ApplicationController::class, 'searchApp'])->name('SearchApp');
Route::get('/store/filter', [ApplicationController::class, 'filterApp'])->name('filterApp');


Route::group(['middleware'=>'auth'], function(){
    Route::post('/addReview', [ReviewAppController::class, 'create'])->name('addReviewApp');
    Route::post('/editReview', [ReviewAppController::class, 'edit'])->name('editReviewApp');
    Route::get('/profile/{x}', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/{x}/edit', [UserController::class, 'viewedit']);
    Route::post('/profile/{x}/edit', [UserController::class, 'edit'])->name('updateData');
  });


Route::group(['middleware'=> ['auth','AdminOrReporter']], function(){
    Route::get('/dashboard', [TicketController::class, 'dashboardSite'])->name('dashboard');
    Route::get('/ticket-task', [TicketController::class, 'ticket_task_dashboard']);
    Route::get('/employee', [UserController::class, 'employee_dashboard']);
    Route::get('/dashboard/detail_tiket_teknisi/{x}', [TicketController::class, 'detailTeknisi']);
    Route::get('/dashboard/detail_task_teknisi/{x}', [TaskController::class, 'detailTeknisi']);
    Route::get('/dashboard/detail_tiket_teknisi/{id}/filter', [TicketController::class, 'filterTeknisi']);
});

Route::group(['middleware'=> ['auth', 'role:Admin']], function(){
    Route::get('/daftar-aplikasi', [ApplicationController::class, 'app_dashboard'])->name('daftar-aplikasi');
    Route::post('/daftar-aplikasi/hapus/{id}', [ApplicationController::class, 'deleteApp']);
    Route::get('/daftar-aplikasi/tambah', [ApplicationController::class, 'showFormCreate']);
    Route::post('/daftar-aplikasi/tambah', [ApplicationController::class, 'createApp'])->name('create-app');
    
    Route::get('/daftar-aplikasi/edit/{id}', [ApplicationController::class, 'showEditForm']);
    Route::post('/daftar-aplikasi/edit/{id}', [ApplicationController::class, 'updateApp']);
});
