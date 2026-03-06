<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

use App\Models\Gallery;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\ContactMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🔧 Global model bindings
        Route::model('gallery', \App\Models\Gallery::class);
        Route::model('course', \App\Models\Course::class);
        Route::model('lesson', \App\Models\Lesson::class);
        Route::model('task', \App\Models\Task::class);
        Route::model('ticket', \App\Models\ContactMessage::class);

        // 🌍 Automatically include locale in ALL route() calls
        if (request()->route()) {
            URL::defaults([
                'locale' => request()->route('locale')
            ]);
        }
    }
}