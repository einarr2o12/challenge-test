<?php

namespace App\Providers;

use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class BindUserServiceProvider
 */
class BindUserServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}