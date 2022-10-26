<?php

namespace App\Models\Trip;

use App\Models\Trip\Traits\TripRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory, TripRelationships;

    public $timestamps = false;

    protected $with = ['stages', 'departure', 'arrival'];
}
