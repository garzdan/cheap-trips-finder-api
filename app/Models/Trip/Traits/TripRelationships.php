<?php

namespace App\Models\Trip\Traits;

use App\Models\TripStage\TripStage;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait TripRelationships
{
    public function stages(): HasMany
    {
        return $this->hasMany(TripStage::class, 'trip_id')
            ->orderBy('trip_stages.ordering');
    }
}
