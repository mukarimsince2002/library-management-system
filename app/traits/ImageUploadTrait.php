<?php
// app/Traits/ImageUploadTrait.php

namespace App\Traits;

trait ImageUploadTrait
{
    public function uploadImage($image, $folder)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/'.$folder), $imageName);
        return 'uploads/'.$folder.'/'.$imageName;
    }
}
