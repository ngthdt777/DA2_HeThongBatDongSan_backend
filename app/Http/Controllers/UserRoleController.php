<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    public function index(){
        return response()->json(UserRole::get(),200);
    }
    
    public function show($id)
    {
        $userRole = UserRole::find($id);
        if (is_null($userRole))
        {
            return response()->json(["message" => "userRole $id Not Found"], 404);
        }
        return response()->json($userRole, 200);
    }

    public function update(Request $request, $id)
    {
        $userRole = UserRole::find($id);
        if (is_null($userRole))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $userRole->update($request->all());
        return response()->json($userRole, 200);
    }

    public function destroy($id)
    {
        $userRole = UserRole::find($id);
        if (is_null($userRole))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $userRole->delete();
        return response()->json(["message" => "userRole $id is deleted"], 204);
    }
}