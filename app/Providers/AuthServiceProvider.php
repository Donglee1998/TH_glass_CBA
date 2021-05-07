<?php

namespace App\Providers;
use App\Models\Admin;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Admin::class => AdminPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // policy Admin
        Gate::define('admin-list', 'App\Policies\AdminPolicy@view');
        Gate::define('admin-add', 'App\Policies\AdminPolicy@create');
        Gate::define('admin-edit', 'App\Policies\AdminPolicy@update');
        Gate::define('admin-delete', 'App\Policies\AdminPolicy@delete');

        // policy Role
        Gate::define('role-list', 'App\Policies\RolePolicy@view');
        Gate::define('role-edit', 'App\Policies\RolePolicy@create');
        Gate::define('role-add', 'App\Policies\RolePolicy@update');
        Gate::define('role-delete', 'App\Policies\RolePolicy@delete');

        // policy Event
        Gate::define('event-list', 'App\Policies\EventPolicy@view');
        Gate::define('event-edit', 'App\Policies\EventPolicy@create');
        Gate::define('event-add', 'App\Policies\EventPolicy@update');
        Gate::define('event-delete', 'App\Policies\EventPolicy@delete');

        Gate::define('user-list', 'App\Policies\UserPolicy@view');
        Gate::define('user-edit', 'App\Policies\UserPolicy@create');
        Gate::define('user-add', 'App\Policies\UserPolicy@update');
        Gate::define('user-delete', 'App\Policies\UserPolicy@delete');

    }
}
