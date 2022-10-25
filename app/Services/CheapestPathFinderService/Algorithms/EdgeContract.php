<?php

namespace App\Services\CheapestPathFinderService\Algorithms;

interface EdgeContract
{
    public function getSource(): NodeContract;
    public function getDestination(): NodeContract;
    public function getWeight(): int;
}
