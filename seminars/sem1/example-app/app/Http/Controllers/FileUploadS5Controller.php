<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadS5Controller extends Controller
{
    //
    public function showForm()
    {
        return view('upload_form_s5');
    }

    public function fileUpload(Request $request)
    {
        // if ($request->hasFile('upload_photo')) {
        //     $file = $request->file('upload_photo');
        //     echo $file->path() . '<br>';
        //     echo $file->getClientOriginalName() . '<br>';
        //     echo $file->getClientOriginalExtension() . '<br>';
        //     $file->storeAs('public/images', $file->getClientOriginalName());
        // } else {
        //     return "No file uploaded.";
        // }

        foreach ($request->upload_photo as $photo) {
            echo "<pre>";
            var_dump($photo);
            echo "</pre>";
        }
    }
}
