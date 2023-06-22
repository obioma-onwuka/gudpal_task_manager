<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [FrontViewController::class, 'welcome'])->name('welcome');

// account control routes
Route::get('/login', [LoginController::class, 'loadLoginForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.try');

Route::get('/register', [RegisterController::class, 'loadRegisterForm'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.try');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout.try');
Route::get('/de-authorized', [LogoutController::class, 'showLogin'])->name('logout.redirect');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [LoginController::class, 'toDashboard'])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::get('/settings', [ProfileController::class, 'showProfileForm'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'saveProfileUpdate'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'deleteProfile'])->name('profile.delete');

    Route::get('/password', [ProfileController::class, 'loadPasswordForm'])->name('password.edit');
    Route::put('/password', [ProfileController::class, 'password'])->name('password.try');



    // Tasks
    Route::get('/add-task', [TaskController::class, 'loadTaskForm'])->name('task.create');
    Route::post('/add-task', [TaskController::class, 'create'])->name('task.try');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->where('task', '[0-9]+')->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'loadEditForm'])->where('task', '[0-9]+')->name('tasks.edit');
    Route::put('/tasks/edit/{task}', [TaskController::class, 'update'])->where('task', '[0-9]+')->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'delete'])->where('task', '[0-9]+')->name('tasks.delete');

});
