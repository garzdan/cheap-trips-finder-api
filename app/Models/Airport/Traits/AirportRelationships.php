<?php

namespace App\Models\Airport\Traits;

use App\Models\Trip\Trip;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait AirportRelationships
{
    public function tripsAsArrival(): MorphMany
    {
       return $this->morphMany(Trip::class, 'arrival');
    }

    public function tripsAsDestination(): MorphMany
    {
        return $this->morphMany(Trip::class, 'destination');
    }
}
