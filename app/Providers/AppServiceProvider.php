<?php

namespace App\Providers;
use Illuminate\Support\Arr;
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
        $this->app->singleton(
            \App\Repositories\Admin\AdminRepositoryInterface::class,
            \App\Repositories\Admin\AdminRepository::class,
            \App\Repositories\Role\RoleRepositoryInterface::class,
            \App\Repositories\Role\RoleRepository::class,
            \App\Repositories\RoleAdmin\RoleAdminRepositoryInterface::class,
            \App\Repositories\RoleAdmin\RoleAdminRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['router']->matched(function (\Illuminate\Routing\Events\RouteMatched $e) {
        $route = $e->route;
        if (!Arr::has($route->getAction(), 'guard')) {
            return;
        }
        $routeGuard = Arr::get($route->getAction(), 'guard');
        $this->app['auth']->resolveUsersUsing(function ($guard = null) use ($routeGuard) {
            return $this->app['auth']->guard($routeGuard)->user();
        });
        $this->app['auth']->setDefaultDriver($routeGuard);
        });
    }
}
