<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            // Get the first setting or return null if no settings exist
            $setting = Setting::first();

            // Pass the setting object to the view, even if it's null
            $view->with('setting', $setting);

            // Check if the setting object is not null before accessing its properties
            if ($setting) {
                $view->with('default_avatar', $setting->default_avatar);
                $view->with('currency', $setting->currency_icon);
            } else {
                // Fallback values if no setting is found
                $view->with('default_avatar', 'default-avatar.png'); // or any default value/path
                $view->with('currency', '$'); // default currency symbol or value
            }
        });
    }
}