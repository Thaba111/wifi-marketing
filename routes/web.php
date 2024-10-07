<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('profile', ProfileController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('guest')->group(function () { 
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
   
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
  
});
Route::post('/logout', function () {
return redirect('/');})->name('logout');


Route::post('/admin/suspend/{id}', [AdminController::class, 'suspendUser'])->name('admin.suspend');
Route::post('/admin/unsuspend/{id}', [AdminController::class, 'unsuspendUser'])->name('admin.unsuspend');

Route::resource('contacts', ContactController::class);
// Route::post('contacts/import', [ContactController::class, 'import'])->name('contacts.import');
// Route::get('contacts/export', [ContactController::class, 'export'])->name('contacts.export');
Route::get('/admin/contacts/import', [ContactController::class, 'import'])->name('contacts.import');
Route::post('/admin/contacts/import', [ContactController::class, 'importStore'])->name('contacts.import.store');
Route::get('/admin/contacts/export', [ContactController::class, 'export'])->name('contacts.export');


require __DIR__.'/auth.php';
