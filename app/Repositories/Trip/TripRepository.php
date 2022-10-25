<?php

namespace App\Repositories\Trip;

use App\Models\Trip\Trip;
use App\Repositories\TripStage\TripStageRepository;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;

class TripRepository implements TripRepositoryContract
{
    public function __construct(protected TripStageRepository $tripStageRepository) {}

    /**
     * @param NodeContract $departure
     * @param NodeContract $arrival
     * @param NodeContract[] $path
     * @param int $cost
     * @return Trip
     */
    public function create(NodeContract $departure, NodeContract $arrival, array $path, int $cost): Trip {
        $trip = new Trip();
        $trip->departure_id = $departure->getNodeId();
        $trip->departure_type = get_class($departure);
        $trip->arrival_id = $arrival->getNodeId();
        $trip->arrival_type = get_class($arrival);
        $trip->cost = $cost;
        $trip->save();

        foreach($path as $key => $stage) {
            $this->tripStageRepository->create($trip, $stage, $key);
        }

        return $trip;
    }
}
