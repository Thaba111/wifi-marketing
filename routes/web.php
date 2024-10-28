<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\BannerImpressionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CaptivePortalController;



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
Route::get('/admin/contacts/import', [ContactController::class, 'import'])->name('contacts.import');
Route::post('/admin/contacts/import', [ContactController::class, 'importStore'])->name('contacts.import.store');
Route::get('/admin/contacts/export', [ContactController::class, 'export'])->name('contacts.export');

Route::resource('banners', BannerController::class);
Route::resource('ads', AdController::class);
Route::post('/banners/click/{bannerId}', [BannerController::class, 'clickBanner'])->name('banners.click');
Route::get('/banners/{banner}/analytics', [BannerController::class, 'bannerAnalytics'])
     ->name('banners.analytics');
Route::post('/record-click/{banner}', [BannerImpressionController::class, 'recordClick']);
Route::post('/record-click/{banner}', [BannerController::class, 'recordClick']);
Route::post('/record-click/{bannerId}', [BannerController::class, 'recordClick']);

Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::get('/settings/create', [SettingController::class, 'create'])->name('settings.create');
Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

Route::post('/captive-portal/store', [CaptivePortalController::class, 'store'])->name('captive-portal.store');
Route::view('/captive-portal/create', 'captive-portal.create');



require __DIR__.'/auth.php';
