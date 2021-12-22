<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
use App\Http\Requests\Employee\AddRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
>>>>>>> 1b4e5e590fdf0bfafae4a106ce52970c501e9399

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
<<<<<<< HEAD
=======

    public function add()
    {
        return view('page.employee.add');
    }

    public function add_process(AddRequest $request): RedirectResponse
    {
        $request->validated();

        $nama_depan = $request->input('first-name');
        $nama_tengah = $request->input('middle-name') ?? '';
        $nama_belakang = $request->input('last-name');
        $nama_pengguna = $request->input('username');
        $kata_sandi = password_hash($request->input('password'), PASSWORD_BCRYPT);
        $surel = $request->input('email');

        DB::table('employee')->insert([
            'employee_id' => Str::uuid(),
            'user_roles_id' => 1,
            'employee_firstname' => $nama_depan,
            'employee_middlename' => $nama_tengah,
            'employee_lastname' => $nama_belakang,
            'employee_username' => $nama_pengguna,
            'employee_password' => $kata_sandi,
            'employee_email' => $surel,
            'employee_status' => 3,
            'employee_image' => Str::random(),
            'created_by' => Str::uuid(),
            'updated_by' => Str::uuid()
        ]);

        return redirect()->route('employee.index');
    }
>>>>>>> 1b4e5e590fdf0bfafae4a106ce52970c501e9399
}
