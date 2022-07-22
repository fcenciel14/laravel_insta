<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public static function upload($image_file, $folder_name)
    {
        $file_name = time();
        $extension = $image_file->extension();
        $file_name_to_store = $file_name . '.' . $extension;
        $resized_image = Image::make($image_file)->resize(1920, 1080)->encode();
        Storage::put('public/' . $folder_name . '/' . $file_name_to_store, $resized_image);

        return $file_name_to_store;
    }

    public static function delete($old_image, $folder_name)
    {
        $image_path = 'public/' . $folder_name . '/' . $old_image;
        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }
}