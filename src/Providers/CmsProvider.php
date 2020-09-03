<?php

namespace techlink\cms\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use techlink\cms\Http\View\Composers\CategoryComposer;
use techlink\cms\Http\View\Composers\PostComposer;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
           \techlink\cms\Console\Commands\CmsCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->registerPublishable();
        }

        $this->registerResources();
        $this->bootViewComposers();
    }

    private function registerResources()
    {
        //load the migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        //load the views
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'cms');

        $this->registerRoutes();
    }

    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function() {
           $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            'middleware' => ['web', 'auth'],
            'as' => 'cms.',
            'prefix' => 'cms',
            'namespace' => 'techlink\cms\Http\Controllers',
        ];
    }

    private function registerPublishable()
    {
        $this->publishes([
            __DIR__.'/../../config/cms.php' => config_path('cms.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../public/assets' => public_path('vendor/techlink/cms'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../../resources/views' => base_path('resources/views/techlink/cms'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../../database/migrations' => base_path('database/migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../../database/factories' => base_path('database/factories'),
        ], 'factories');
    }

    private function bootViewComposers()
    {
        View::composer('cms::categories.form', CategoryComposer::class);
        View::composer('cms::posts.form', PostComposer::class);
    }
}