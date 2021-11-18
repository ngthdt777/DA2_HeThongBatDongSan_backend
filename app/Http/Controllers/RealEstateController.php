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
            'name' => 'required',
            'orientation' => 'required',
            'acreage' => 'required',
            'price' => 'required',
            'address' => 'required',
            'floor' => 'required',
            'numberOfRoom' => 'required',
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
    //---------------------------Filter-----------------------------------
    //--------price-----------
    public function GetRealEstateOrderByPriceFromLowToHigh(Request $request)
    {

        $realEstate = RealEstate::orderBy('price','asc')->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByPriceFromHighToLow(Request $request)
    {

        $realEstate = RealEstate::orderBy('price','desc')->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByPriceLowerThan500(Request $request)
    {
        $realEstate = RealEstate::where('price', '<', 500000000)->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByPriceFrom500To1(Request $request)
    {
        $realEstate = RealEstate::where('price', '>=', 500000000)
                                ->where('price', '<', 1000000000)
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByPriceOver1(Request $request)
    {
        $realEstate = RealEstate::where('price', '>', 1000000000)->get();

        return response()->json($realEstate, 200);
    }
    //-----------acreage---------------
    public function GetRealEstateOrderByAcreageFromLowToHigh(Request $request)
    {

        $realEstate = RealEstate::orderBy('acreage','asc')->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByAcreageFromHighToLow(Request $request)
    {

        $realEstate = RealEstate::orderBy('acreage','desc')->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByAcreageLowerThan30(Request $request)
    {
        $realEstate = RealEstate::where('acreage', '<', 30)
                                ->orderBy('acreage','asc')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByAcreageFrom30To100(Request $request)
    {
        $realEstate = RealEstate::where('acreage', '>=', 30)
                                ->where('acreage', '<', 100)
                                ->orderBy('acreage','asc')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByAcreageOver100(Request $request)
    {
        $realEstate = RealEstate::where('acreage', '>', 100)
                                ->orderBy('acreage','asc')
                                ->get();

        return response()->json($realEstate, 200);
    }
    //-----------orientation----------------
    public function GetRealEstateOrderByOrientationNorth(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'BẮC')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByOrientationNorthEast(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'TÂY BẮC')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByOrientationEast(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'TÂY')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByOrientationSouthEast(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'TÂY NAM')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByOrientationSouth(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'NAM')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByOrientationSouthWest(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'ĐÔNG NAM')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByOrientationWest(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'ĐÔNG')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByOrientationNorthWest(Request $request)
    {
        $realEstate = RealEstate::where('orientation', 'ĐÔNG BẮC')
                                ->get();

        return response()->json($realEstate, 200);
    }
    //------------numberOfRoom--------------
    public function GetRealEstateOrderByNumberOfRoomOver1(Request $request)
    {
        $realEstate = RealEstate::where('numberOfRoom', '>=', 1)
                                ->orderBy('numberOfRoom','asc')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByNumberOfRoomOver2(Request $request)
    {
        $realEstate = RealEstate::where('numberOfRoom', '>=', 2)
                                ->orderBy('numberOfRoom','asc')
                                ->get();

        return response()->json($realEstate, 200);
    }

    public function GetRealEstateOrderByNumberOfRoomOver3(Request $request)
    {
        $realEstate = RealEstate::where('numberOfRoom', '>=', 3)
                                ->orderBy('numberOfRoom','asc')
                                ->get();

        return response()->json($realEstate, 200);
    }
    //-----------lastest-------------------
    public function GetRealEstateOrderByLastest(Request $request)
    {

        $realEstate = RealEstate::orderBy('dateCreated','desc')->get();

        return response()->json($realEstate, 200);
    }
}