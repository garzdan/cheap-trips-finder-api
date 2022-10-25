<?php

namespace App\Services\CheapestPathFinderService;

use App\Models\Trip\Trip;
use App\Services\CheapestPathFinderService\Algorithms\AlgorithmContract;
use App\Services\CheapestPathFinderService\Algorithms\EdgeContract;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;
use App\Services\CheapestPathFinderService\Algorithms\SolutionContract;
use Illuminate\Support\Collection;

interface CheapestPathFinderServiceContract
{
    /**
     * @param Collection $hubs
     * @param Collection $connections
     * @param NodeContract $departure
     * @param NodeContract $arrival
     * @param int $maxStopovers
     * @return SolutionContract|null
     */
    public function find(
        Collection $hubs,
        Collection $connections,
        NodeContract $departure,
        NodeContract $arrival,
        int $maxStopovers
    ): SolutionContract|null;
}
