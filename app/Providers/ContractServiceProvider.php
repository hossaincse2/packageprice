<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PackageInterface;
use App\Repositories\PackageRepo;

class ContractServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app>bind(PackageInterface::class, PackageRepo::class);
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
