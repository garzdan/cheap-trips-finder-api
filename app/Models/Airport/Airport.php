<?php

namespace App\Models\Airport;

use App\Services\CheapestPathFinderService\Algorithms\NodeContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model implements NodeContract
{
    use HasFactory;

    public $timestamps = false;

    public function getNodeId(): int
    {
        return $this->id;
    }
}
