<?php

namespace App\Console\Commands;

use App\Models\Airport\Airport;
use App\Models\Flight\Flight;
use App\Repositories\Trip\TripRepositoryContract;
use App\Services\CheapestPathFinderService\CheapestPathFinderServiceContract;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FindCheapestTrips extends Command
{
    public function __construct(
        protected CheapestPathFinderServiceContract $cheapestPathFinderService,
        protected TripRepositoryContract $tripRepository,
    ) {
        parent::__construct();

    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cheapest-trips:find';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find the cheapest trips between the available airports and store them in db';

    /**
     * Execute the console command.
     *
     */
    public function handle(): void
    {
        DB::raw('truncate trips cascade');

        DB::transaction(function () {
            $airports = Airport::all();
            $flights = Flight::all();

            foreach ($airports as $departure) {
                foreach($airports as $arrival) {
                    if ($departure->code === $arrival->code) {
                        continue;
                    }

                    $path = $this->cheapestPathFinderService
                        ->find($airports, $flights, $departure, $arrival, config('app.trips.max_stopovers'));

                    if($path) {
                        $this->tripRepository->create($departure, $arrival, $path->getNodes(), $path->getCost());
                    }
                }
            }
        });
    }
}
