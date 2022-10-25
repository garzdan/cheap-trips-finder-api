<?php

namespace App\Providers;

use App\Repositories\Trip\TripRepository;
use App\Repositories\Trip\TripRepositoryContract;
use App\Repositories\TripStage\TripStageRepository;
use App\Repositories\TripStage\TripStageRepositoryContract;
use App\Services\CheapestPathFinderService\Algorithms\AlgorithmContract;
use App\Services\CheapestPathFinderService\Algorithms\BellmanFordAlgorithm;
use App\Services\CheapestPathFinderService\CheapestPathFinderService;
use App\Services\CheapestPathFinderService\CheapestPathFinderServiceContract;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // services
        $this->app->bind(CheapestPathFinderServiceContract::class, CheapestPathFinderService::class);

        // repositories
        $this->app->bind(TripRepositoryContract::class, TripRepository::class);
        $this->app->bind(TripStageRepositoryContract::class, TripStageRepository::class);

        // utils
        $this->app->bind(AlgorithmContract::class, BellmanFordAlgorithm::class);
    }
}
