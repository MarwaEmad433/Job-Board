<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

// الصفحة الرئيسية لعرض القوائم
Route::get('/', [ListingController::class, 'index'])
    ->name('listings.index');

// عرض صفحة إنشاء قائمة جديدة
Route::get('/new', [ListingController::class, 'create'])
    ->middleware('auth')
    ->name('listings.create');

// تخزين قائمة جديدة
Route::post('/new', [ListingController::class, 'store'])
    ->middleware('auth')
    ->name('listings.store');

// عرض لوحة التحكم للمستخدم المسجل
Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    return view('dashboard', [
        'listings' => $request->user()->listings
    ]);
})->middleware(['auth', 'verified'])
    ->name('dashboard');

// عرض تفاصيل قائمة معينة
Route::get('/{listing}', [ListingController::class, 'show'])
    ->name('listings.show');

// عرض صفحة التقديم للوظيفة
Route::get('/{listing}/apply', [ListingController::class, 'apply'])
    ->middleware('auth')
    ->name('listings.apply');

// تخزين بيانات التقديم
Route::post('/{listing}/apply', [ListingController::class, 'storeApplication'])
    ->middleware('auth')
    ->name('applications.store');

// صفحة تأكيد تقديم الطلب
Route::get('/applications/confirmation', function () {
    return view('applications.confirmation');
})->name('applications.confirmation');

