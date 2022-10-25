<?php

namespace App\Services\CheapestPathFinderService\Algorithms;

use Illuminate\Support\Collection;

class BellmanFordAlgorithm implements AlgorithmContract
{

    /**
     * @param Collection<NodeContract> $vertices
     * @param Collection<EdgeContract> $edges
     * @param NodeContract $source
     * @param NodeContract $destination
     * @param int $maxSteps
     * @return SolutionContract|null
     */
    public function run(Collection $vertices, Collection $edges, NodeContract $source, NodeContract $destination, int $maxSteps): object|null
    {
        $sourceId = $source->getNodeId();
        $destinationId = $destination->getNodeId();

        /** @var int[] $costs */
        $costs = [];

        /** @var NodeContract[] $parents */
        $parents = [];

        $path = [$destination];

        foreach ($vertices as $vertex) {
            $vertexId = $vertex->getNodeId();
            $costs[$vertexId] = INF;
            $parents[$vertexId] = null;
        }

        $costs[$sourceId] = 0;

        for ($i = 0; $i < $maxSteps; $i++) {
            $tmpCosts = $costs;
            $tmpParents = $parents;

            foreach($edges as $edge) {
                $eSource = $edge->getSource();
                $eSourceId = $eSource->getNodeId();
                $eDestination = $edge->getDestination();
                $eDestinationId = $eDestination->getNodeId();
                $eWeight = $edge->getWeight();

                if ($costs[$eSourceId] === INF) {
                    continue;
                }

                if (($costs[$eSourceId] + $eWeight) < $tmpCosts[$eDestinationId]) {
                    $tmpCosts[$eDestinationId] = $costs[$eSourceId] + $eWeight;
                    $tmpParents[$eDestinationId] = $eSource;
                }
            }

            $costs = $tmpCosts;
            $parents = $tmpParents;
        }

        if ($costs[$destinationId] === INF) {
            return null;
        }

        $parent = $parents[$destinationId];
        while ($parent !== null) {
            array_unshift($path, $parent);
            $parent = $parents[$parent->getNodeId()];
        }

        return new Solution($path, $costs[$destinationId]);
    }
}
