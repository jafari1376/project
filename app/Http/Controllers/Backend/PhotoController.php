<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function upload(PhotoRequest $request)
    {
        $uploadedFile = $request->file('file');
        $filename =time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            'public/photos', $uploadedFile, $filename
        );
        $photo =new Photo();
        $photo->path =$filename;
        $photo->original_name=$original_name;
        //$photo->user_id=1;
         $photo->save();
        //alert()->success('عکس '.$photo->$original_name.' با موفقیت آپلود شد.','آپلود عکس')->persistent("بستن");
        return response()->json(['photo_id'=>$photo->id]);
    }

    public function store(Request $request)
    {
        $uploadedFile = $request->file('file');
        $filename =time().$uploadedFile->getClientOriginalName();
        $original_name=$uploadedFile->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'images/', $uploadedFile, $filename
        );
        return response()->json(['photo_name'=>$filename]);
    }

}
