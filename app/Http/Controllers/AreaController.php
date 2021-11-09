<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    public function index(){
        return response()->json(Area::get(),200);
    }

    public function show($id)
    {
        $area = Area::find($id);
        if (is_null($area))
        {
            return response()->json(["message" => "Area $id Not Found"], 404);
        }
        return response()->json($area, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $area = Area::create($request->all());
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $area],
                                201);
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        if (is_null($area))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $area->update($request->all());
        return response()->json($area, 200);
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        if (is_null($area))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $area->delete();
        return response()->json(["message" => "Area $id is deleted"], 204);
    }
}
