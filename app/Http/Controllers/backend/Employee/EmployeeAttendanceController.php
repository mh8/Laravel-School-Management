<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    //
    public function EmployeeAttendanceView()
    {
        $data['employee_data'] = EmployeeAttendance::orderBy('id', 'DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }

    //
    public function EmployeeAttendanceCreate()
    {
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_create', $data);
    }
}
