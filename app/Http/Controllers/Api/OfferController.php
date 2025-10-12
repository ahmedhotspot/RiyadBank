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
        $offers = Offer::whereHas('customer',function($customerQuery) use ($request) {
            if($request->has('id_information')){
                $customerQuery->where('id_information', $request->id_information);
            }
        })
        
        ->with('customer')->filter($request)->orderBy('created_at', 'desc')->paginate(10);

        return response()->ResponseJson('Offers retrieved successfully',[
            'offers' => OfferResource::collection($offers),
            'pagination' => $this->paginate($offers)
            ]);
           

    }
}
