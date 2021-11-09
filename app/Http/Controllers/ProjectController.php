<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(){
        return response()->json(Project::with('projectMedia')->get(),200);
    }

    public function show($id)
    {
        $project = Project::with('projectMedia')->find($id);
        if (is_null($project))
        {
            return response()->json(["message" => "Project $id Not Found"], 404);
        }
        return response()->json($project, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'investor' => 'required',
            'introduce' => 'required',
            'info' => 'required',
            'customerBenefit' => 'required',
            'procedure' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $project = Project::create($request->all());
        return response()->json([
                                "message" => "Added successfully",
                                "data" => $project],
                                201);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $project->update($request->all());
        return response()->json($project, 200);
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if (is_null($project))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $project->delete();
        return response()->json(["message" => "Project $id is deleted"], 204);
    }
}