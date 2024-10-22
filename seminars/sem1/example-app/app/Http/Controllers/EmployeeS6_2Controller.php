<?php

namespace App\Http\Controllers;

use App\Models\EmployeeS6_2;
use Illuminate\Http\Request;

class EmployeeS6_2Controller extends Controller
{
    public function show($id = null)
    {
        // if ($id) {
        //     $employee = EmployeeS6_2::where('id', $id)->first();
        // } else {
        //     $employee = null;
        // }
        return view('employee_s6_2', ['employee' => $id ? EmployeeS6_2::where('id', $id)->first() : null]);
    }

    public function store(Request $request)
    {
        // var_dump($request->all());
        $employee = new EmployeeS6_2($request->all());

        // Преобразуем массив в строку, т.к. в модели параметр department имеет строковый тип, а в поле формы он передается как массив
        $employee->department = serialize($request->input('department'));

        // $employee->first_name = $request->input("first_name");
        // $employee->last_name = $request->input("last_name");
        // $employee->department = $request->input("department");

        $employee->save();

        return redirect()->route('show_employees_s6_2', ['id' => $employee->id]);
    }
}
