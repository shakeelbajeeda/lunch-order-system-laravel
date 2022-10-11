<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload_file($img_file,$folder_name= 'products')
    {

        $image = base64_encode(file_get_contents($img_file->path()));
        $final_img =  "data:image/png;base64, " .$image;
        return $final_img;
    }

    public function remove_file($filename,$folder = 'products')
    {
        if (file_exists(public_path('storage/images/'.$folder.'/' . $filename))) {
            unlink(public_path('storage/images/'.$folder.'/' . $filename));
        }
    }
}
