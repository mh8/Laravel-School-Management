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
        // $data['employee_data'] = EmployeeAttendance::orderBy('id', 'DESC')->get();
        $data['employee_data'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }

    //
    public function EmployeeAttendanceCreate()
    {
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_create', $data);
    }

    //
    public function EmployeeAttendanceStore(Request $request)
    {
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $count_employee = count($request->employee_id);
        for ($i = 0; $i < $count_employee; $i++) {
            $attendance_status = 'attendance_status' . $i;
            $employee_attendance = new EmployeeAttendance();
            $employee_attendance->employee_id = $request->employee_id[$i];
            $employee_attendance->date = date('Y-m-d', strtotime($request->date));
            $employee_attendance->attendance_status = $request->$attendance_status;
            $employee_attendance->save();
        }
        $notification = array(
            'message' => 'Successfully Attendance Added',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.attendance.view')->with($notification);
    }

    //
    public function EmployeeAttendanceEdit($date)
    {
        $data['editData'] = EmployeeAttendance::where('date', $date)->get();
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_attendance.employee_attendance_edit', $data);
    }

    //
    public function EmployeeAttendanceUpdate(Request $request, $date)
    {
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $count_employee = count($request->employee_id);
        for ($i = 0; $i < $count_employee; $i++) {
            $attendance_status = 'attendance_status' . $i;
            $employee_attendance = new EmployeeAttendance();
            $employee_attendance->employee_id = $request->employee_id[$i];
            $employee_attendance->date = date('Y-m-d', strtotime($request->date));
            $employee_attendance->attendance_status = $request->$attendance_status;
            $employee_attendance->save();
        }
        $notification = array(
            'message' => 'Successfully Attendance Updated Added',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.attendance.view')->with($notification);
    }
    public function EmployeeAttendanceDetails($date)
    {
        $data['details'] = EmployeeAttendance::where('date', $date)->get();
        return view('backend.employee.employee_attendance.employee_attendance_details', $data);
    }
}
