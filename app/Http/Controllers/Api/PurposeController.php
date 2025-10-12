<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    public function index(Request $request)
    {   
        $purposes = \App\Models\Purpose::paginate(10);
        return response()->ResponseJson('Purposes retrieved successfully',[
            'purposes' => \App\Http\Resources\PurposeResource::collection($purposes),
            'pagination' => $this->paginate($purposes)
            ]);
    }
}
