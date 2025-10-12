<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OwnershipResource;
use Illuminate\Http\Request;

class OwnershipController extends Controller
{
    public function index(Request $request)
    {
        $ownerships = \App\Models\Ownership::paginate(10);
        return response()->ResponseJson('Ownerships retrieved successfully',[
            'ownerships' => OwnershipResource::collection($ownerships),
            'pagination' => $this->paginate($ownerships)
            ]);
    }
}
