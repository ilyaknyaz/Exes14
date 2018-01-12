<?php

namespace App\Providers;

use App\Repositories\EloquentMembers;
use App\Repositories\MembersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MembersRepository::class, EloquentMembers::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            MembersRepository::class,
        ];
    }
}