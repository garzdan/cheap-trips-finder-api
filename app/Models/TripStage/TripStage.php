<?php

namespace App\Models\TripStage;

use App\Models\TripStage\Traits\TripStageRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripStage extends Model
{
    use HasFactory, TripStageRelationships;

    public $timestamps = false;

    protected $with = ['stage'];
}
