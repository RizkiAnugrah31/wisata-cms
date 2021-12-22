<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employee')->selectRaw('if(employee_middlename is not null, concat_ws(\' \', employee_firstname, employee_middlename, employee_lastname), concat_ws(\' \', employee_firstname, employee_lastname)) full_name');
        $employees = $employees->addSelect('employee_email as email');
        $employees = $employees->get();

        return view('page.employee.index', [
            'employees' => $employees
        ]);
    }
}
