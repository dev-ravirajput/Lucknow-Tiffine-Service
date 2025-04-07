<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
Route::get('/menu', [WelcomeController::class, 'menu'])->name('menu');

Route::get('/test-page', function () {
    return view('admin.test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/kitchens', [AdminController::class, 'kitchens'])->name('admin.kitchens');
    Route::get('/admin/create-kitchens', [AdminController::class, 'create_kitchens'])->name('admin.create.kitchens');
    Route::post('/admin/store-kitchens', [AdminController::class, 'store_kitchens'])->name('admin.store.kitchens');

    Route::get('/admin/avatars', [AdminController::class, 'avatars'])->name('admin.avatars');
    Route::get('/admin/create-avatars', [AdminController::class, 'create_avatars'])->name('admin.create.avatars');
    Route::post('/admin/store-avatars', [AdminController::class, 'store_avatars'])->name('admin.store.avatars');
    Route::get('/admin/{id}/edit-avatars', [AdminController::class, 'edit_avatars'])->name('admin.edit.avatars');
    Route::put('/admin/{id}/update-avatars', [AdminController::class, 'update_avatars'])->name('admin.update.avatars');
    Route::delete('/admin/{id}/delete-avatars', [AdminController::class, 'delete_avatars'])->name('admin.delete.avatars');
});

Route::middleware(['auth', 'role:kitchen'])->group(function () {
    Route::get('/kitchen', function () {
        return view('kitchen.dashboard');
    });
});

Route::middleware(['auth', 'role:delevery'])->group(function () {
    Route::get('/delevery', function () {
        return view('delevery.dashboard');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
