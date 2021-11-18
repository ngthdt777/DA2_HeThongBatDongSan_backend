<?php

namespace App\Http\Controllers;

use App\Models\RealEstateMedia;
use App\Models\ProjectMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function getImageByRealEstateId($realEstateId)
    {
        $image = RealEstateMedia::where('realEstateId',$realEstateId);
        
        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('name', $image->name)
            ->first();

        $contents = $googleDriveStorage->get($fileinfo['path']);
        return response($contents)
            ->header('Content-Type', $fileinfo['mimetype'])
            ->header('Content-Disposition', "attachment; filename='" . $fileinfo['name'] . "'");
    }
    public function getImageByProjectId($projectId)
    {
        $image = ProjectMedia::where('projectId',$projectId);
        
        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('name', $image->name)
            ->first();

        $contents = $googleDriveStorage->get($fileinfo['path']);
        return response($contents)
            ->header('Content-Type', $fileinfo['mimetype'])
            ->header('Content-Disposition', "attachment; filename='" . $fileinfo['name'] . "'");
    }

    public function uploadRealEstateMediaImage(Request $request){
        $path = $request->file('photo')->store('','google');

        $image = new RealEstateMedia();
        $image->name = $path;
        $image->realEstateId = $request->realEstateId;
        $image->type = $request->type;
        $image->path = $request->path;
        $image->save();

        return response()->json(['upload success ' . $path], 200);
    }
    public function uploadProjectImage(Request $request)
    {
        $path = $request->file('photo')->store('','google');

        $image = new ProjectMedia();
        $image->name = $path;
        $image->projectId = $request->projectId;
        $image->type = $request->type;
        $image->path = $request->path;
        $image->save();

        return response()->json(['upload success ' . $path], 200);
    }

    public function deleteRealEstateImageById($id)
    {
        $image = ReaEstateMediaModel::find($id);
        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('type', 'file')
            ->where('name', $image->name)
            ->first();
        
        $googleDriveStorage->delete($fileinfo['path']);

        //delete file name in database
        $image->delete();

        return response()->json(['Deleted realEstateMedia image name: '.$image->name.' where id = '.$id], 200);
    }
    public function deleteProjectImageById($id)
    {
        $image = ProjectMediaModel::find($id);
        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('type', 'file')
            ->where('name', $image->name)
            ->first();
        
        $googleDriveStorage->delete($fileinfo['path']);

        //delete file name in database
        $image->delete();

        return response()->json(['Deleted projectMedia image name: '.$image->name.' where id = '.$id], 200);

    }
}