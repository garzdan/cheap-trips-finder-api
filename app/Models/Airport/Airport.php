<?php

namespace App\Models\Airport;

use App\Models\Airport\Traits\AirportRelationships;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model implements NodeContract
{
    use HasFactory, AirportRelationships;

    public $timestamps = false;

    public function getNodeId(): int
    {
        return $this->id;
    }

}
