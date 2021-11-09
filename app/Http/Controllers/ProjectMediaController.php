<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProjectMedia;
use Illuminate\Support\Facades\Validator;

class ProjectMediaController extends Controller
{
    public function index(){
        return response()->json(ProjectMedia::get(),200);
    }

    public function show($id)
    {
        $projectMedia = ProjectMedia::find($id);
        if (is_null($projectMedia))
        {
            return response()->json(["message" => "Media $id Not Found"], 404);
        }
        return response()->json($projectMedia, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'projectId' => 'required',
            'type' => 'required',
            'path' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $projectMedia = ProjectMedia::create($request->all());
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $projectMedia],
                                201);
    }

    public function update(Request $request, $id)
    {
        $projectMedia = ProjectMedia::find($id);
        if (is_null($projectMedia))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $projectMedia->update($request->all());
        return response()->json($projectMedia, 200);
    }

    public function destroy($id)
    {
        $projectMedia = ProjectMedia::find($id);
        if (is_null($projectMedia))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $projectMedia->delete();
        return response()->json(["message" => "ProjectMedia $id is deleted"], 204);
    }
}