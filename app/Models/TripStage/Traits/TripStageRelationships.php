<?php

namespace App\Models\TripStage\Traits;

use App\Models\Trip\Trip;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait TripStageRelationships
{
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

    public function stage(): MorphTo
    {
        return $this->morphTo();
    }

}
