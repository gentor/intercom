<?php

namespace Gentor\Intercom;


use Illuminate\Support\ServiceProvider;

class IntercomServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('intercom', function ($app) {
            return new IntercomService($app['config']['intercom']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['intercom'];
    }

}