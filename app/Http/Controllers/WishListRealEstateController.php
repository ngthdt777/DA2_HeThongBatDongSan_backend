<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishListRealEstate;
use Illuminate\Support\Facades\Validator;

class WishListRealEstateController extends Controller
{
    public function index(){
        return response()->json(WishListRealEstate::with('realEstate')->get(),200);
    }

    public function show($id)
    {
        $wishListRealEstate = WishListRealEstate::with('realEstate')->find($id);
        if (is_null($wishListRealEstate))
        {
            return response()->json(["message" => "wishListRealEstate $id Not Found"], 404);
        }
        return response()->json($wishListRealEstate, 200);
    }

    
    public function store(Request $request)
    {
        $rules = [
            'wishListId' => 'required',
            'realEstateId' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $wishListRealEstate = WishListRealEstate::create($request->all());
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $wishListRealEstate],
                                201);
    }

    public function update(Request $request, $id)
    {
        $wishListRealEstate = WishListRealEstate::find($id);
        if (is_null($wishListRealEstate))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $wishListRealEstate->update($request->all());
        return response()->json($wishListRealEstate, 200);
    }

    public function destroy($id)
    {
        $wishListRealEstate = WishListRealEstate::find($id);
        if (is_null($wishListRealEstate))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $wishListRealEstate->delete();
        return response()->json(["message" => "wishListRealEstate $id is deleted"], 204);
    }
}