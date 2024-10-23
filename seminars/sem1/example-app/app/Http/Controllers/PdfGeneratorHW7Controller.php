<?php

namespace App\Http\Controllers;

use App\Models\UserS7;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PdfGeneratorHW7Controller extends Controller
{
    public function index($id)
    {
        $user = UserS7::where('id', $id)->first();

        $data = [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email
        ];

        $pdf = app(PDF::class);
        $pdf->loadView('resume_hw7', compact('data'));
        return $pdf->stream('resume_hw7.pdf');
    }
}
