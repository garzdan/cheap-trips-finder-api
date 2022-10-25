<?php

namespace App\Http\Controllers\Api\V1\Airport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AirportResource;
use App\Models\Airport\Airport;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return AirportResource::collection((Airport::query())->jsonPaginate());
    }
}
