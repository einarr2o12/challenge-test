<?php

namespace App\Providers;

use App\Http\Repositories\PostRepository;
use App\Http\Repositories\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class BindPostServiceProvider
 */
class BindPostServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }
}