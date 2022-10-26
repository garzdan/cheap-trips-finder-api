<?php

namespace App\Models\Trip\Traits;

use App\Models\TripStage\TripStage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait TripRelationships
{
    public function stages(): HasMany
    {
        return $this->hasMany(TripStage::class, 'trip_id')
            ->orderBy('trip_stages.ordering');
    }

    public function departure(): MorphTo
    {
        return $this->morphTo();
    }

    public function arrival(): MorphTo
    {
        return $this->morphTo();
    }
}
