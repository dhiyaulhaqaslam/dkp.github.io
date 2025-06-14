<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use App\Models\Article;
use App\Models\Longwis;
use App\Models\Project;

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
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });

        View::composer('*', function ($view) {
            // Ambil URL saat ini
            $currentUrl = url()->current();

            // Potong segmen terakhir dari URL
            $segments = explode('/', $currentUrl);
            if (count($segments) > 3) { // Pastikan URL memiliki lebih dari domain dan subdomain
                array_pop($segments); // Hapus segmen terakhir
                $backUrl = implode('/', $segments); // Gabungkan kembali segmen
            } else {
                $backUrl = url('/'); // Kembali ke root jika URL terlalu pendek
            }

            // Bagikan $backUrl ke semua view
            $view->with('backUrl', $backUrl);
        });

        View::composer('layouts.dashboard', function ($view) {
            $view->with([
                'feedbackCount' => Feedback::count(),
                'articleCount' => Article::count(),
                'longwisCount' => Longwis::count(),
                'projectCount' => Project::count(),
            ]);
        });

    }
}
