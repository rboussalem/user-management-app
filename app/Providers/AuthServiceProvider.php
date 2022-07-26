<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin_permission', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('user_permission', function (User $user) {
            return $user->role === 'user' || $user->role === 'admin';
        });

        Gate::define('guest_permission', function (User $user) {
            return $user->role === 'guest' || $user->role === 'admin';
        });
    }
}
