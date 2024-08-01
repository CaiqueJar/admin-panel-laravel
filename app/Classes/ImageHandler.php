<?php

namespace App\Classes;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageHandler
{

    public static function deleteImage($image_name, $path) {

        $path = rtrim($path, '/');

        if (File::exists($path . '/' . $image_name)) {
            File::delete($path . '/' . $image_name);
            return true;
        }

        return false;
    }

    public static function saveImage($image, $webp_convert, $path)
    {
        $format = $webp_convert ? 'webp' : $image->getClientOriginalExtension();

        $image_name = Str::uuid() . "." . $format;
        $img = Image::make($image);

        $path = rtrim($path, '/');

        $img->encode($format, 90)->save(public_path($path . '/' . $image_name));

        return $image_name;
    }
}
