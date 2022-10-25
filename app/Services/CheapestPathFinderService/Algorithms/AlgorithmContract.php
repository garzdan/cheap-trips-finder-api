<?php

namespace App\Services\CheapestPathFinderService\Algorithms;

use Illuminate\Support\Collection;

interface AlgorithmContract
{
    /**
     * @return SolutionContract|null
     */
    public function run(Collection $vertices, Collection $edges, NodeContract $source, NodeContract $destination, int $maxSteps): object|null;
}
