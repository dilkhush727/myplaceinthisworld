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
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\School\TicketController as SchoolTicketController;
use App\Http\Controllers\Teacher\TicketController as TeacherTicketController;

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;

use App\Http\Controllers\LearningCourseController;

use App\Http\Controllers\Admin\LearningProgressController;

use App\Http\Controllers\School\LearningProgressController as SchoolLearningProgressController;
use App\Http\Controllers\Teacher\LearningProgressController as TeacherLearningProgressController;

use App\Http\Controllers\Admin\SchoolMembershipController;

use App\Http\Controllers\StripeWebhookController;

use App\Http\Controllers\ChatbotController;

use App\Http\Controllers\School\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;


Route::get('/', function () {
    return view('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->hasRole('school')) {
        return redirect()->route('school.dashboard');
    }

    if ($user->hasRole('teacher')) {
        return redirect()->route('teacher.dashboard');
    }

    abort(403);
})->middleware(['auth'])->name('dashboard');


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

    // ⭐ Admin Courses (Divisions of Learning)
    Route::resource('courses', AdminCourseController::class)
        ->names('admin.courses')
        ->except(['show']);

    // ⭐ Lessons for a Course
    Route::prefix('courses/{course}')->group(function () {
        // ⭐ LESSONS
        Route::get('/lessons', [AdminLessonController::class, 'index'])->name('admin.courses.lessons.index');
        Route::get('/lessons/create', [AdminLessonController::class, 'create'])->name('admin.courses.lessons.create');
        Route::post('/lessons', [AdminLessonController::class, 'store'])->name('admin.courses.lessons.store');
        Route::get('/lessons/{lesson}/edit', [AdminLessonController::class, 'edit'])->name('admin.courses.lessons.edit');
        Route::put('/lessons/{lesson}', [AdminLessonController::class, 'update'])->name('admin.courses.lessons.update');
        Route::delete('/lessons/{lesson}', [AdminLessonController::class, 'destroy'])->name('admin.courses.lessons.destroy');

        // ⭐ TASKS inside a lesson
        Route::prefix('lessons/{lesson}')->group(function () {
            Route::get('/tasks', [AdminTaskController::class, 'index'])
                ->name('admin.courses.lessons.tasks.index');

            Route::get('/tasks/create', [AdminTaskController::class, 'create'])
                ->name('admin.courses.lessons.tasks.create');

            Route::post('/tasks', [AdminTaskController::class, 'store'])
                ->name('admin.courses.lessons.tasks.store');

            Route::get('/tasks/{task}/edit', [AdminTaskController::class, 'edit'])
                ->name('admin.courses.lessons.tasks.edit');

            Route::put('/tasks/{task}', [AdminTaskController::class, 'update'])
                ->name('admin.courses.lessons.tasks.update');

            Route::delete('/tasks/{task}', [AdminTaskController::class, 'destroy'])
                ->name('admin.courses.lessons.tasks.destroy');
        });
    });

    // ⭐ Learning progress dashboard
    Route::get('/learning-progress', [LearningProgressController::class, 'index'])
        ->name('admin.learning-progress.index');

    // ⭐ Course drilldown
    Route::get('/learning-progress/courses/{course}', [LearningProgressController::class, 'showCourse'])
        ->name('admin.learning-progress.course');

    // ⭐ Admin membership management
    Route::get('/memberships', [SchoolMembershipController::class, 'index'])
        ->name('admin.memberships.index');

    Route::get('/memberships/schools/{school}', [SchoolMembershipController::class, 'show'])
        ->name('admin.memberships.show');

    Route::post('/memberships/schools/{school}/grant', [SchoolMembershipController::class, 'grant'])
        ->name('admin.memberships.grant');

    Route::post('/memberships/{membership}/status', [SchoolMembershipController::class, 'updateStatus'])
        ->name('admin.memberships.updateStatus');

    // ⭐ Admin Contact Messages
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{contactMessage}', [AdminContactController::class, 'show'])->name('admin.contacts.show');

    Route::patch('/contacts/{contactMessage}/status', [AdminContactController::class, 'updateStatus'])
        ->name('admin.contacts.status'); // ✅ FIXED

    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');

});

Route::middleware(['auth'])
    ->prefix('school')
    ->name('school.')
    ->group(function () {
        Route::get('/dashboard', [SchoolDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/school/dashboard', [DashboardController::class, 'index'])
        ->name('school.dashboard');
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

    // ⭐ Learning progress for this school
    Route::get('/learning-progress', [SchoolLearningProgressController::class, 'index'])
        ->name('school.learning-progress.index');

    // ⭐ Course drilldown
    Route::get('/learning-progress/courses/{course}', [SchoolLearningProgressController::class, 'showCourse'])
        ->name('school.learning-progress.course');
        
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

    // ⭐ My Learning progress
    Route::get('/learning-progress', [TeacherLearningProgressController::class, 'index'])
        ->name('teacher.learning-progress.index');
        
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Update profile info (name, email, phone, etc.)
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Update password (separate form)
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');

    // Update profile photo (AJAX)
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])
        ->name('profile.photo.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin|school|teacher'])
    ->prefix('divisions')
    ->group(function () {
    Route::get('/', [DivisionController::class, 'index'])->name('divisions.index');
    Route::get('/primary', [DivisionController::class, 'primary'])->name('divisions.primary');
    Route::get('/junior-intermediate', [DivisionController::class, 'juniorIntermediate'])->name('divisions.ji');
    Route::get('/high-school', [DivisionController::class, 'highSchool'])->name('divisions.highschool');

    // Course player
    Route::get('/courses/{course}', [LearningCourseController::class, 'show'])
        ->name('courses.show');

    Route::get('/courses/{course}/tasks/{task}', [LearningCourseController::class, 'showTask'])
        ->name('courses.tasks.show');

    Route::post('/courses/{course}/tasks/{task}/toggle-complete',
        [LearningCourseController::class, 'toggleTaskCompletion'])
        ->name('courses.tasks.toggle-complete');

    // ✅ Save notes (AJAX)
    Route::post('/courses/{course}/tasks/{task}/notes',
        [LearningCourseController::class, 'saveNotes'])
        ->name('courses.tasks.notes.save');

});

// Route::get('/redirect', function () {
//     $user = auth()->user();

//     if ($user->hasRole('admin')) {
//         return redirect('/admin/dashboard');
//     }

//     if ($user->hasRole('school')) {
//         return redirect('/school/dashboard');
//     }

//     if ($user->hasRole('teacher')) {
//         return redirect('/teacher/dashboard');
//     }

//     return redirect('/');
// })->middleware('auth');

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

// Public Division of Learning landing page
Route::view('/division-of-learning', 'division-of-learning')
    ->name('division.of.learning');

// Stripe Webhook endpoint
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle'])
    ->name('stripe.webhook');


Route::prefix('chatbot')->middleware(['web', 'throttle:30,1'])->group(function () {
    Route::post('/session', [ChatbotController::class, 'createSession'])->name('chatbot.session');
    Route::post('/message', [ChatbotController::class, 'sendMessage'])->name('chatbot.message');
});


Route::view('/chatbot-test', 'chatbot.test')->name('chatbot.test');

require __DIR__.'/auth.php';
