<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Interface
use App\Contracts\PackageInterface;
use App\Contracts\OrderInterface;
use App\Contracts\ActivityLogInterface;
use App\Contracts\PackageQueryInterface;

//Repository
use App\Repositories\PackageRepo;
use App\Repositories\OrderReop;
use App\Repositories\PackageQueryReop;
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
        $this->app->bind(PackageQueryInterface::class, PackageQueryReop::class);
        $this->app->bind(OrderInterface::class, OrderReop::class);
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
