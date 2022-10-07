<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\{
    UserRepository,
    TaskRepository
};

use App\Repositories\Contracts\{
    UserRepositoryInterface,
    TaskRepositoryInterface
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     UserRepositoryInterface::class,
        //     TaskRepositoryInterface::class
        // );

        // $this->app->bind(
        //     UserRepository::class,
        //     TaskRepository::class
        // );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
