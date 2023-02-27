<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Contracts\ResolvesTenants;

class AppServiceProvider extends ServiceProvider
{
    /** 
     * Register any application services.
     *
     * @return void
     */
    public function register()  
    {
<<<<<<< HEAD
        if (env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
||||||| fbb88af
        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
            $resolver->addModel(User::class);

            return $resolver;
        });
=======
        // $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
        //     $resolver->addModel(User::class);

        //     return $resolver;
        // });
>>>>>>> master
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);
    }
}
