<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\WishList;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return response()->json(UserModel::with('role','wishList')->get(),200);
    }

    public function show($id)
    {
        $user = UserModel::with('role','wishList')->find($id);
        if (is_null($user))
        {
            return response()->json(["message" => "user $id Not Found"], 404);
        }
        return response()->json($user, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'userRoleId' => 'required',
            'email' => 'required',
            'DoB' => 'required',
            'password' => 'required',
            'phone' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $user = UserModel::create($request->all());
        // if ($user){
        //     WishList::create($user->attributes());
        // }
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $user],
                                201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $user->delete();
        return response()->json(["message" => "User $id is deleted"], 204);
    }
}