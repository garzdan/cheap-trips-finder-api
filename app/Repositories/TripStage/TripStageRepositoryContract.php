<?php

namespace App\Repositories\TripStage;

use App\Models\Trip\Trip;
use App\Models\TripStage\TripStage;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;

interface TripStageRepositoryContract
{
    public function create(Trip $trip, NodeContract $stage, int $ordering): TripStage;
}
