<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'departure' => new AirportResource($this->departure),
            'arrival' => new AirportResource($this->arrival),
            'stages' => TripStageResource::collection($this->stages),
            'cost' => $this->cost,
        ];
    }
}
