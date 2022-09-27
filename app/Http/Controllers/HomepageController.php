<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function post(Request $request)
    {
        if ($request->ajax())
        {
            $image_data = $request->image;
            $image_array_1 = explode(";",$image_data);
            $image_array_2 = explode(",",$image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time().'.png';
            $upload_path = public_path('img/crop/'.$image_name);
            file_put_contents($upload_path,$data);

            return $upload_path;
        }
    }
}
