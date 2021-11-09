<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use Illuminate\Support\Facades\Validator;

class RealEstateController extends Controller
{
    public function index(){
        return response()->json(RealEstate::with('area','realEstateType','user','realEstateMedia')->get(),200);
    }

    public function show($id)
    {
        $realEstate = RealEstate::with('area','realEstateType','user','realEstateMedia')->find($id);
        if (is_null($realEstate))
        {
            return response()->json(["message" => "RealEstate $id Not Found"], 404);
        }
        return response()->json($realEstate, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'areaId' => 'required',
            'typeId' => 'required',
            'userId' => 'required',
            'sold' => 'required',
            'length' => 'required',
            'width' => 'required',
            'orientation' => 'required',
            'acreage' => 'required',
            'price' => 'required',
            'location' => 'required',
            'address' => 'required',
            'facade' => 'required',
            'mainLine' => 'required',
            'floor' => 'required',
            'bedRoom' => 'required',
            'bathRoom' => 'required',
            'description' => 'required',
            'dateCreated' => 'required',
            'dateModified' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $realEstate = RealEstate::create($request->all());
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $realEstate],
                                201);
    }

    public function update(Request $request, $id)
    {
        $realEstate = RealEstate::find($id);
        if (is_null($realEstate))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $realEstate->update($request->all());
        return response()->json($realEstate, 200);
    }

    public function destroy($id)
    {
        $realEstate = RealEstate::find($id);
        if (is_null($realEstate))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $realEstate->delete();
        return response()->json(["message" => "RealEstate $id is deleted"], 204);
    }
}