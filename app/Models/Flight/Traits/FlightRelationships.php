<?php

namespace App\Models\Flight\Traits;

use App\Models\Airport\Airport;
use App\Models\TripStage\TripStage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait FlightRelationships
{
    public function departure(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'code_departure', 'code');
    }

    public function arrival(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'code_arrival', 'code');
    }

    public function tripStages(): MorphMany
    {
        return $this->morphMany(TripStage::class, 'stage');
    }
}
