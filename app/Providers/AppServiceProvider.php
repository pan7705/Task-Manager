<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Category;
use App\Observers\TaskObserver;
use App\Observers\ProjectObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Task::observe(TaskObserver::class);
        Project::observe(ProjectObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
