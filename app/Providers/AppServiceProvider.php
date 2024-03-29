<?php

namespace App\Providers;

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
        // $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
        //     $resolver->addModel(User::class);

        //     return $resolver;
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }
}
