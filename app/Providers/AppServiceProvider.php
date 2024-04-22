<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


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
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        \Carbon\Carbon::setLocale('ru');

        Blade::directive('customDate', function ($expression) {
            return "<?php echo \Carbon\Carbon::parse($expression)->format('d F Y г H:i'); ?>";
        });
    }
}
