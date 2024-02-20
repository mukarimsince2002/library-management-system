<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{

    private function uploadPhoto($image, $folder)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/'.$folder), $imageName);
        return 'uploads/'.$folder.'/'.$imageName;
    }

    private function updatePhoto($image, $folder, $oldImageName=NULL)
    {
        $this->deleteImage($oldImageName);
        return $this->uploadPhoto($image, $folder);
    }

    private function deleteImage($imageName)
    {
        if ($imageName && File::exists(public_path($imageName))) {
            File::delete(public_path($imageName));
        }
    }


}
