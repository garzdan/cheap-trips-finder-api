<?php

namespace App\Services\CheapestPathFinderService\Algorithms;

class Solution implements SolutionContract
{
    public function __construct(protected array $nodes, protected int $cost) {}
    /**
     * @inheritDoc
     */
    public function getNodes(): array
    {
        return $this->nodes;
    }

    public function getCost(): int
    {
       return $this->cost;
    }
}
