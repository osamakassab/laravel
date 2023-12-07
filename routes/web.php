<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    ############################ Profile CRUD Management ############################
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    ############################ Groups CRUD Management ############################
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/show/{id}', [GroupController::class, 'show'])->name('groups.show');
    Route::get('/groups/my-groups', [GroupController::class, 'showUserGroups'])->name('groups.my_groups');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::get('/groups/delete/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');
    Route::post('/groups/store', [GroupController::class, 'store'])->name('groups.store');

    ########################### Files CRUD Management #################################
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/files/show/{id}', [FileController::class, 'show'])->name('files.show');
    Route::get('/files/create', [FileController::class, 'create'])->name('files.create');
    Route::get('/files/delete/{id}', [FileController::class, 'destroy'])->name('files.destroy');
    Route::post('/files/store', [FileController::class, 'store'])->name('files.store');
    Route::middleware('check.file.access')->group(function () {
        // Checkin: some explain
        Route::get('/files/checkin/{file_id}', [FileController::class, 'checkin'])->name('files.checkin');

    });
    // Checkout: some explain
        Route::get('/files/checkinAll/{ids}', [FileController::class, 'checkinAll'])->name('files.checkinAll');
        Route::post('/files/checkout/{file_id}', [FileController::class, 'checkout'])->name('files.checkout');
});

require __DIR__ . '/auth.php';
