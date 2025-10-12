<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentialController extends Controller
{
    
    public function index(Request $request)
    {   
        $residentials = \App\Models\Residential::paginate(10);
        return response()->ResponseJson('Residential retrieved successfully',[
            'residentials' => \App\Http\Resources\ResidentialResource::collection($residentials),
            'pagination' => $this->paginate($residentials)
            ]);
    }
}
