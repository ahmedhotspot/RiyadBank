<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index(Request $request)
    {
        $offers = Offer::with('customer')->filter($request)->orderBy('created_at', 'desc')->paginate(10);

        return response()->ResponseJson([
            'success' => true,
            'message' => 'Offers retrieved successfully',
            'data' => OfferResource::collection($offers),
            'pagination' => [
                'current_page' => $offers->currentPage(),
                'last_page' => $offers->lastPage(),
                'per_page' => $offers->perPage(),
                'total' => $offers->total(),
            ]
        ]);
    }
}
