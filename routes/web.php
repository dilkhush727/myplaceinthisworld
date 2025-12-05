<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\School\SchoolDashboardController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\School\MembershipController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\School\TeacherController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\School\TicketController as SchoolTicketController;
use App\Http\Controllers\Teacher\TicketController as TeacherTicketController;


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // ⭐ Gallery Routes
    Route::get('/galleries', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/galleries/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/galleries', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/galleries/{gallery}/edit', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('/galleries/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/galleries/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    // ⭐ Approval Routes
    Route::post('/galleries/{gallery}/approve', [App\Http\Controllers\Admin\GalleryController::class, 'approve'])->name('admin.gallery.approve');
    Route::post('/galleries/{gallery}/reject', [App\Http\Controllers\Admin\GalleryController::class, 'reject'])->name('admin.gallery.reject');

    // ⭐ Tickets Routes
    Route::get('/tickets', [TicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('admin.tickets.show');
    Route::post('/tickets/{ticket}/reply', [TicketController::class, 'reply'])->name('admin.tickets.reply');
    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('admin.tickets.updateStatus');
});

Route::middleware(['auth', 'role:school'])->prefix('school')->group(function () {

    Route::get('/dashboard', [SchoolDashboardController::class, 'index'])
        ->name('school.dashboard');

    // Manage Memberships
    Route::get('/memberships/manage', [MembershipController::class, 'manage'])
        ->name('school.memberships.manage');
        
    Route::get('/membership/upgrade', 
        [MembershipController::class, 'upgrade'])
        ->name('school.memberships.upgrade');

    Route::post('/membership/purchase', 
        [MembershipController::class, 'purchase'])
        ->name('school.memberships.purchase');

    Route::post('/membership/renew', 
        [MembershipController::class, 'renew'])
        ->name('school.memberships.renew');

    Route::post('/membership/change-billing', 
        [MembershipController::class, 'changeBilling'])
        ->name('school.memberships.changeBilling');

    Route::post('/membership/cancel', 
        [MembershipController::class, 'cancel'])
        ->name('school.memberships.cancel');

    // Teacher Management
    Route::get('/teachers', [TeacherController::class, 'index'])->name('school.teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('school.teachers.create');
    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('school.teachers.store');

    Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('school.teachers.edit');
    
    // Update profile (name, email)
    Route::put('/teachers/{teacher}', [TeacherController::class, 'updateProfile'])
        ->name('school.teachers.updateProfile');

    // Update password only
    Route::put('/teachers/{teacher}/password', [TeacherController::class, 'updatePassword'])
        ->name('school.teachers.updatePassword');

    Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('school.teachers.destroy');

      // ⭐ GALLERY SUBMISSION ROUTES
    Route::get('/galleries', [App\Http\Controllers\School\GalleryController::class, 'index'])
        ->name('school.gallery.index');

    Route::get('/galleries/create', [App\Http\Controllers\School\GalleryController::class, 'create'])
        ->name('school.gallery.create');

    Route::post('/galleries', [App\Http\Controllers\School\GalleryController::class, 'store'])
        ->name('school.gallery.store');

    Route::get('/galleries/{gallery}/edit', [App\Http\Controllers\School\GalleryController::class, 'edit'])
        ->name('school.gallery.edit');

    Route::put('/galleries/{gallery}', [App\Http\Controllers\School\GalleryController::class, 'update'])
        ->name('school.gallery.update');

    Route::delete('/galleries/{gallery}', [App\Http\Controllers\School\GalleryController::class, 'destroy'])
        ->name('school.gallery.destroy');

    // ⭐ SCHOOL TICKETS ROUTES
    Route::get('/tickets', [SchoolTicketController::class, 'index'])->name('school.tickets.index');
    Route::get('/tickets/{ticket}', [SchoolTicketController::class, 'show'])->name('school.tickets.show');
    Route::post('/tickets/{ticket}/reply', [SchoolTicketController::class, 'reply'])->name('school.tickets.reply');
});

// Route::post('/membership/purchase', 
//     [\App\Http\Controllers\School\MembershipController::class, 'purchase'])
//     ->name('school.memberships.purchase');

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');

     Route::get('/gallery', [App\Http\Controllers\Teacher\GalleryController::class, 'index'])
        ->name('teacher.gallery.index');

    Route::get('/gallery/create', [App\Http\Controllers\Teacher\GalleryController::class, 'create'])
        ->name('teacher.gallery.create');

    Route::post('/gallery', [App\Http\Controllers\Teacher\GalleryController::class, 'store'])
        ->name('teacher.gallery.store');

    Route::get('/gallery/{gallery}/edit', [App\Http\Controllers\Teacher\GalleryController::class, 'edit'])
        ->name('teacher.gallery.edit');

    Route::put('/gallery/{gallery}', [App\Http\Controllers\Teacher\GalleryController::class, 'update'])
        ->name('teacher.gallery.update');

    Route::delete('/gallery/{gallery}', [App\Http\Controllers\Teacher\GalleryController::class, 'destroy'])
        ->name('teacher.gallery.destroy');

    // ⭐ TEACHER TICKETS ROUTES
    Route::get('/tickets', [TeacherTicketController::class, 'index'])->name('teacher.tickets.index');
    Route::get('/tickets/{ticket}', [TeacherTicketController::class, 'show'])->name('teacher.tickets.show');
    Route::post('/tickets/{ticket}/reply', [TeacherTicketController::class, 'reply'])->name('teacher.tickets.reply');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:school|teacher'])
    ->prefix('divisions')
    ->group(function () {
    Route::get('/', [DivisionController::class, 'index'])->name('divisions.index');
    Route::get('/primary', [DivisionController::class, 'primary'])->name('divisions.primary');
    Route::get('/junior-intermediate', [DivisionController::class, 'juniorIntermediate'])->name('divisions.ji');
    Route::get('/high-school', [DivisionController::class, 'highSchool'])->name('divisions.highschool');
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

// Contact Us page
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


// Frontend pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/gallery-of-growth', [GalleryController::class, 'index'])
    ->name('gallery.index');

Route::post('/gallery/like', [App\Http\Controllers\GalleryLikeController::class, 'toggle'])
    ->name('gallery.like');
    
Route::view('/membership', 'membership')->name('membership');
Route::view('/terms-and-conditions', 'terms-and-conditions')->name('terms-and-conditions');


require __DIR__.'/auth.php';
