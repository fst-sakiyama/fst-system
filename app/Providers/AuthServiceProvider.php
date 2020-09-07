<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 開発者のみ許可
        Gate::define('system-only', function ($user) {
          return ($user->role == 1);
        });
        // 管理者以上（開発者＆管理者）に許可
        Gate::define('admin-higher', function ($user) {
          return ($user->role > 0 && $user->role <= 3);
        });
        // 経理チームのみ許可
        Gate::define('account-only', function ($user) {
          return ($user->role == 1 || $user->role == 3 || $user->role == 6);
        });
        // 営業チームのみ許可
        Gate::define('sales-only', function ($user) {
          return ($user->role == 1 || $user->role == 3 || $user->role == 7);
        });
        // 開発チームのみ許可
        Gate::define('dev-only', function ($user) {
          return ($user->role == 1 || $user->role == 3 || $user->role == 8);
        });
        // 運用チームのみ許可
        Gate::define('ope-only', function ($user) {
          return ($user->role == 1 || $user->role == 3 || $user->role == 9);
        });
        // 一般ユーザ以上（つまり全権限）に許可
        Gate::define('user-higher', function ($user) {
          return ($user->role > 0 && $user->role <= 20);
        });
    }
}
