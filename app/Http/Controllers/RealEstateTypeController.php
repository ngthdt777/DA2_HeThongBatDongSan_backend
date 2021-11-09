<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RealEstateType;
use Illuminate\Support\Facades\Validator;

class RealEstateTypeController extends Controller
{
    public function index(){
        return response()->json(RealEstateType::get(),200);
    }

    public function show($id)
    {
        $realEstateType = RealEstateType::find($id);
        if (is_null($realEstateType))
        {
            return response()->json(["message" => "RealEstateType $id Not Found"], 404);
        }
        return response()->json($realEstateType, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $realEstateType = RealEstateType::create($request->all());
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $realEstateType],
                                201);
    }

    public function update(Request $request, $id)
    {
        $realEstateType = RealEstateType::find($id);
        if (is_null($realEstateType))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $realEstateType->update($request->all());
        return response()->json($realEstateType, 200);
    }

    public function destroy($id)
    {
        $realEstateType = RealEstateType::find($id);
        if (is_null($realEstateType))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $realEstateType->delete();
        return response()->json(["message" => "RealEstateType $id is deleted"], 204);
    }
}