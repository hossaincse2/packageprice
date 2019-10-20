<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Interface
use App\Contracts\PackageInterface;
use App\Contracts\ActivityLogInterface;

//Repository
use App\Repositories\PackageRepo;
use App\Services\ActivityLogService;

class ContractServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PackageInterface::class, PackageRepo::class);
        $this->app->bind(ActivityLogInterface::class, ActivityLogService::class);
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
