<?php

namespace App\Providers;

use App\Http\Repositories\LikeRepository;
use App\Http\Repositories\LikeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class BindLikeServiceProvider
 */
class BindLikeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            LikeRepositoryInterface::class,
            LikeRepository::class
        );
    }
}