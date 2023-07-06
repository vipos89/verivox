<?php

namespace App\Providers;

use App\Interfaces\Services\TariffCompareServiceInterface;
use App\Interfaces\Services\TariffProviderInterface;
use App\Services\TariffCompareService;
use App\Services\TariffProviderService;
use Illuminate\Support\ServiceProvider;

class DIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(TariffProviderInterface::class, TariffProviderService::class);
        $this->app->bind(TariffCompareServiceInterface::class, TariffCompareService::class);
    }
}
