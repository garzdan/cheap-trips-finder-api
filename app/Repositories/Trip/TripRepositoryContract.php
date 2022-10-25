<?php

namespace App\Repositories\Trip;

use App\Models\Trip\Trip;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;

interface TripRepositoryContract
{
    public function create(NodeContract $departure, NodeContract $arrival, array $path, int $cost): Trip;
}
