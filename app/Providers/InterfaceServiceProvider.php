<?php

namespace App\Providers;

use App\Interfaces\BaseInterface;
use App\Interfaces\EventInterface;
use App\Interfaces\UserInterface;
use App\Repositories\BaseRepository;
use App\Repositories\EventRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(EventInterface::class, EventRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }
}
