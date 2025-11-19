<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\School\SchoolDashboardController;
use App\Http\Controllers\Teacher\TeacherDashboardController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:school'])->prefix('school')->group(function () {
    Route::get('/dashboard', [SchoolDashboardController::class, 'index'])->name('school.dashboard');

     // Upgrade membership page
    Route::get('/membership/upgrade', 
        [\App\Http\Controllers\School\MembershipController::class, 'upgrade'])
        ->name('school.memberships.upgrade');

    Route::post('/membership/purchase', [MembershipController::class, 'purchase'])->name('school.memberships.purchase');
    Route::post('/membership/renew', [MembershipController::class, 'renew'])->name('school.memberships.renew');
    Route::post('/membership/change-billing', [MembershipController::class, 'changeBilling'])->name('school.memberships.changeBilling');
    Route::post('/membership/cancel', [MembershipController::class, 'cancel'])->name('school.memberships.cancel');

});

// Route::post('/membership/purchase', 
//     [\App\Http\Controllers\School\MembershipController::class, 'purchase'])
//     ->name('school.memberships.purchase');

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/redirect', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect('/admin/dashboard');
    }

    if ($user->hasRole('school')) {
        return redirect('/school/dashboard');
    }

    if ($user->hasRole('teacher')) {
        return redirect('/teacher/dashboard');
    }

    return redirect('/');
})->middleware('auth');


require __DIR__.'/auth.php';
