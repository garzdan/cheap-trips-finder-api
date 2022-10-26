<?php

namespace App\Http\Controllers\Api\V1\Trip;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\TripResource;
use App\Models\Airport\Airport;
use App\Models\Trip\Trip;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $departureFilter = $request->get('departure');
        $arrivalFilter = $request->get('arrival');
        $queryBuilder = (Trip::orderBy('cost'));

        if($departureFilter) {
            $departure = Airport::where('code', $departureFilter)->first();
            $queryBuilder = $departure ? $queryBuilder->where('departure_id', $departure->id) : $queryBuilder;
        }

        if($arrivalFilter) {
            $arrival = Airport::where('code', $arrivalFilter)->first();
            $queryBuilder = $arrival ? $queryBuilder->where('arrival_id', $arrival->id) : $queryBuilder;
        }

        return TripResource::collection($queryBuilder->get());
    }
}
