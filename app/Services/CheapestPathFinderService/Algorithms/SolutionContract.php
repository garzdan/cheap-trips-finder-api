<?php

namespace App\Services\CheapestPathFinderService\Algorithms;

interface SolutionContract
{
    /**
     * @return NodeContract[]
     */
    public function getNodes(): array;

    public function getCost(): int;
}
