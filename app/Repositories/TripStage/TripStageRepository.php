<?php

namespace App\Repositories\TripStage;

use App\Models\Trip\Trip;
use App\Models\TripStage\TripStage;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;

class TripStageRepository implements TripStageRepositoryContract
{
    public function create(Trip $trip, NodeContract $stage, int $ordering): TripStage
    {
        $tripStage = new TripStage();
        $tripStage->trip_id = $trip->id;
        $tripStage->stage_id = $stage->getNodeId();
        $tripStage->stage_type = get_class($stage);
        $tripStage->ordering = $ordering;
        $tripStage->save();

        return $tripStage;
    }
}
