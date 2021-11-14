<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Support\Facades\Validator;

class WishListController extends Controller
{
    public function index(){
        return response()->json(WishList::with('wishListRealEstate')->get(),200);
    }

    public function show($id)
    {
        $wishList = WishList::with('wishListRealEstate')->find($id);
        if (is_null($wishList))
        {
            return response()->json(["message" => "wishList $id Not Found"], 404);
        }
        return response()->json($wishList, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'userId' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $wishList = WishList::create($request->all());
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $wishList],
                                201);
    }

}