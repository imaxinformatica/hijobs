<?php

namespace App\Providers;
use Schema;
use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(!$this->app->isLocal()){
            \URL::forceScheme('https');
        }
        Auth::provider('candidate', function ($app, array $config) {
            return $app->make(CustomEloquentCandidateProvider::class, ['model' => $config['model']]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
