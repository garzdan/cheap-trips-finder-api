<?php

namespace App\Models\Flight;

use App\Models\Flight\Traits\FlightRelationships;
use App\Services\CheapestPathFinderService\Algorithms\EdgeContract;
use App\Services\CheapestPathFinderService\Algorithms\NodeContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model implements EdgeContract
{
    use HasFactory, FlightRelationships;

    public $timestamps = false;
    protected $with = ['departure', 'arrival'];

    public function getSource(): NodeContract
    {
        return $this->departure;
    }

    public function getDestination(): NodeContract
    {
        return $this->arrival;
    }

    public function getWeight(): int
    {
        return $this->price;
    }
}
