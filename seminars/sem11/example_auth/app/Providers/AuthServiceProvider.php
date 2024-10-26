<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Карта политик для приложения.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Регистрация любых сервисов аутентификации и авторизации.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Пример использования Gate
        // Gate::define('view-users', function (User $user) {
        //     return $user->isAdmin();
        // });
    }
}
