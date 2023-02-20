<?php

namespace App\Providers;

use App\Repository\BaseEloquentRepositoryInterface;
use App\Repository\BaseRepository;
use App\Repository\CastRepository;
use App\Repository\CastRepositoryInterface;
use App\Repository\DirectorRepository;
use App\Repository\DirectorRepositoryInterface;
use App\Repository\MovieRepository;
use App\Repository\MovieRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BaseEloquentRepositoryInterface::class,
            BaseRepository::class,
        );

        $this->app->bind(
            CastRepositoryInterface::class,
            CastRepository::class,
        );

        $this->app->bind(
            DirectorRepositoryInterface::class,
            DirectorRepository::class,
        );

        $this->app->bind(
            MovieRepositoryInterface::class,
            MovieRepository::class,
        );

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
