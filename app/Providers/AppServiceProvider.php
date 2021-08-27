<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // route directive
        Blade::directive('route', function ($expression) { //@route('register.store') ===> route('register.store')
            return "<?php echo route($expression) ?>";
        });

        // old directive
        Blade::directive('old', function ($expression) {
            return "<?php echo old($expression); ?>";
        });

        // uppercase directive
        Blade::directive('uppercase', function ($expression) {
            return "<?php echo strtoupper($expression) ?>";
        });

        // gate in blade use @can() @endcan
        Gate::define('admin', function(){
            return request()->user()->is_admin == 1 ; //return true or false
        });
    }
}
