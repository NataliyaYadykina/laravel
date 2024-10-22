<?php

namespace App\Http\Controllers;

use App\Forms\EmployeeFormS6;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class FormBuilderTestS6_5Controller extends Controller
{
    public function showForm(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(EmployeeFormS6::class, [
            'method' => 'POST',
            'url' => route('post_builder_s6_5')
        ]);

        return view('show_form_s6_5', compact('form'));
    }
}
