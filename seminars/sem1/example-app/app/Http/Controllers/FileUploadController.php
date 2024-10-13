<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $number = $request->cookie('number_of_uploads') ?: 0;

        if ($number > 2) {
            return $number . ' - Maximum number of uploads reached. Please try again later.';
        }

        $name = $request->input('file_name');
        $file = $request->file('uploaded_file');

        $tempPath = $file->getRealPath();
        $newFileName = $name . '.' . $file->getClientOriginalExtension();

        // move_uploaded_file($tempPath, 'public/uploads/' . $newFileName);
        $file->move('./uploads', $newFileName);
        $number++;
        return response($number)->cookie('number_of_uploads', $number);
        // echo '<pre>';
        // var_dump($request->header());
        // echo '</pre>';

        // var_dump($file);
        // return view('upload');
    }
}
