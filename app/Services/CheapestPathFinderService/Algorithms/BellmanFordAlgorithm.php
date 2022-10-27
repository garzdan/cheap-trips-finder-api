<?php

namespace App\Services\CheapestPathFinderService\Algorithms;

use Illuminate\Support\Collection;

class BellmanFordAlgorithm implements AlgorithmContract
{

    /**
     * Bellman-Ford algorithm computes the shortest paths from a single source vertex to all the other vertices in a
     * weighted digraph. This implementation returns the shortest path found in $maxSteps between $source and
     * $destination and its cost, or null if no path is found.
     *
     * @param Collection<NodeContract> $vertices
     * @param Collection<EdgeContract> $edges
     * @param NodeContract $source
     * @param NodeContract $destination
     * @param int $maxSteps
     * @return SolutionContract|null
     */
    public function run(
        Collection $vertices,
        Collection $edges,
        NodeContract $source,
        NodeContract $destination,
        int $maxSteps
    ): object|null
    {
        $sourceId = $source->getNodeId();
        $destinationId = $destination->getNodeId();

        /** @var int[] $costs */
        $costs = [];

        /** @var NodeContract[] $parents */
        $parents = [];

        $path = [$destination];

        // init the costs between $source and all the other vertices to infinite
        // init the parents of all the vertices to null
        foreach ($vertices as $vertex) {
            $vertexId = $vertex->getNodeId();
            $costs[$vertexId] = INF;
            $parents[$vertexId] = null;
        }

        // set to 0 the cost of the path between source and itself
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

                // if cost(source->edge(source)) is infinity, skip the edge
                if ($costs[$eSourceId] === INF) {
                    continue;
                }

                // if cost(source->edge(source)) + cost(edge) < cost(source->edge(destination))
                // then cost(source->edge(destination) = cost(source->edge(source)) + cost(edge)
                // and parent(edge(destination) = edge(source)
                if (($costs[$eSourceId] + $eWeight) < $tmpCosts[$eDestinationId]) {
                    $tmpCosts[$eDestinationId] = $costs[$eSourceId] + $eWeight;
                    $tmpParents[$eDestinationId] = $eSource;
                }
            }

            $costs = $tmpCosts;
            $parents = $tmpParents;
        }

        // if no path has been found between source and destination return null
        if ($costs[$destinationId] === INF) {
            return null;
        }

        // build the cheapest path between source and destination by walking backwards the parents chain,
        // starting from destination
        $parent = $parents[$destinationId];
        while ($parent !== null) {
            array_unshift($path, $parent);
            $parent = $parents[$parent->getNodeId()];
        }

        return new Solution($path, $costs[$destinationId]);
    }
}
