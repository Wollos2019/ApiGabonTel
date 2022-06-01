<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    use ApiResponser;

    public function uploadImage(UploadedFile $image, $path,$model=null)
    {
        if($model->photo){
            File::delete($model->photo);
        }
        $disks=$path;
        $url=null;

        $storagePath= Storage::disk($disks)->put($url,$image);
        $storageName = basename($storagePath);
        return 'rh/'.$path.'/'.$storageName;
    }
    public function deleteImage($image){
        if($image){
            File::delete($image);
        }
    }


    public  function  uploadFile(UploadedFile $file, $path, $value= null){
        if($value)
        {
            File::delete($value);

        }
        $disks=$path;
        $url=null;
        $storagePath = Storage::disk($disks)->put($url,$file);
        $storageName = basename($storagePath);

        return 'files/'.$path.'/'.$storageName;
    }

    public function deleteFile($file){
        if($file){
            File::delete($file);
        }
    }
}
