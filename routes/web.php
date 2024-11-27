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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class,'homepage']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('profile', ProfileController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Redirect 'login' route to captive portal
// Route::get('login', function () {
//     return view('captive-portal.brew-heaven.create');
// })->name('login');

// // Redirect 'login' route to flavor-fusion
// Route::get('login', function () {
//     return view('captive-portal.flavor-fusion.create');
// })->name('login');

// Redirect 'login' route to flavor-fusion
Route::get('login', function () {
    return view('captive-portal.mamas-sauce.create');
})->name('login');



// Existing login logic
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);


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

Route::get('/captive-portal/brew-heaven', [CaptivePortalController::class, 'showBrewHeaven'])->name('captive-portal.brew-heaven');
Route::get('/captive-portal/flavor-fusion', [CaptivePortalController::class, 'showFlavorFusion'])->name('captive-portal.flavor-fusion');
Route::get('/captive-portal/mamas-sauce', [CaptivePortalController::class, 'showMamasSauce'])->name('captive-portal.mamas-sauce');

Route::post('/captive-portal/store', [CaptivePortalController::class, 'store'])->name('captive-portal.store');

Route::post('/captive-portal/connect', [CaptivePortalController::class, 'connect'])->name('captive-portal.connect');

Route::get('/captive-portal/success', [CaptivePortalController::class, 'success'])->name('captive-portal.success');


Route::middleware(['web'])->group(function () {
    Route::controller(SocialiteController::class)->group(function () {
        Route::get('auth/redirection/{provider}', 'authProviderRedirect')->name('auth.redirection');
        Route::get('auth/{provider}/call-back', 'socialAuthentication')->name('auth.callback');
    });
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/admin/dashboard'); 
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/admin/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/admin/dashboard'); 
})->middleware(['auth:admin', 'signed'])->name('filament.admin.auth.email-verification.verify');

require __DIR__.'/auth.php';

