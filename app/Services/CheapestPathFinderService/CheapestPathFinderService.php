<?php

namespace App\Services\CheapestPathFinderService;

use App\Services\CheapestPathFinderService\Algorithms\AlgorithmContract;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;
use App\Services\CheapestPathFinderService\Algorithms\SolutionContract;
use Illuminate\Support\Collection;

class CheapestPathFinderService implements CheapestPathFinderServiceContract
{
    public function __construct(protected AlgorithmContract $algorithm) {}

    /**
     * Runs an algorithm to find the cheapest path between $departure and $arrival with max $maxStopovers.
     * Returns the path found and its cost or null if no path is found.
     *
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
    ): SolutionContract|null
    {
        $solution = $this->algorithm->run($hubs, $connections, $departure, $arrival, $maxStopovers);

        return $solution ?? null;
    }
}
