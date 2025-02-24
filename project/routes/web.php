<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClubController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

   
    Route::get('/admin/categories', [CategoryController::class, 'list'])->name('categories.list');
    Route::get('/admin/categories/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::post('/admin/categories/save', [CategoryController::class, 'save'])->name('categories.save');
    Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/admin/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

    
    Route::get('/admin/clubs', [ClubController::class, 'list'])->name('clubs.list');
    Route::get('/admin/clubs/add', [ClubController::class, 'add'])->name('clubs.add');
    Route::post('/admin/clubs/save', [ClubController::class, 'save'])->name('clubs.save');
    Route::get('/admin/clubs/edit/{id}', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::post('/admin/clubs/update/{id}', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/admin/clubs/delete/{id}', [ClubController::class, 'delete'])->name('clubs.delete');
});

// Routes pour les étudiants
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});
