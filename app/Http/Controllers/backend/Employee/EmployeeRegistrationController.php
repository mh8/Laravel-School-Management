<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeRegistrationController extends Controller
{
    public function EmployeeRegistrationView()
    {
        $data['employeeData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_registration.employee_view',$data);
    }
    public function EmployeeRegistrationCreate()
    {
        $data['designations'] = Designation::all();
        return view('backend.employee.employee_registration.employee_create',$data);
    }
}
