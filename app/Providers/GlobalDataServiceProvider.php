<?php

namespace App\Providers;

use App\Models\Ville;
use App\Models\Categorie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class GlobalDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share villes and categories with all views
        View::composer('*', function ($view) {
            // Cache villes for better performance - cache for 1 hour
            $allVilles = Cache::remember('all_villes', 3600, function () {
                return Ville::orderBy('nom')->get();
            });
            
            // Cache categories for better performance - cache for 1 hour
            $allCategories = Cache::remember('all_categories', 3600, function () {
                return Categorie::orderBy('nom')->get();
            });
            
            $view->with('allVilles', $allVilles);
            $view->with('allCategories', $allCategories);
        });
    }
}