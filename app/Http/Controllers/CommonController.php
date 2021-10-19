<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public static function fileUploaded($slug = true, $image_name = false, $image, $directory, $size = ['width' => null, 'height' => null], $old_image = null){

        $currentDate = Carbon::now()->toDateString();
        if ($slug){
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        }

        Image::make($image)->resize($size['width'], $size['height'])
            ->save(public_path(    "uploads/{$directory}/".$image_name),'100');

        if ($old_image){
            self::deleteImage($directory, $old_image);
        }

        return $image_name;
    }

    public static function deleteImage($directory, $image_name){

        if (file_exists("uploads/{$directory}/".$image_name)){
            unlink("uploads/{$directory}/".$image_name);
        }
    }
}
