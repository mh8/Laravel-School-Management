<?php

namespace App\Http\Controllers\backend\Report;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class AttendanceReportController extends Controller
{
    //
    public function AttendanceView()
    {
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.report.attendance.attendance_report_view', $data);
    }

    //
    public function AttendanceGetEmployee(Request $request)
    {
        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date.'%'];
        }
        $single_attendance = EmployeeAttendance::with(['user'])->where($where)->get();

        if ($single_attendance == true) {
            $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
            $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attendance_status', 'Absent')->get()->count();
            $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attendance_status', 'Leave')->get()->count();
            $data['presents'] = EmployeeAttendance::with(['user'])->where($where)->where('attendance_status', 'Present')->get()->count();
            $data['month'] = date('F', strtotime($request->date));

            $pdf = PDF::loadView('backend.report.attendance.attendance_report_pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('attendance_report.pdf');

        }else{
            $notification = array(
                'message' => 'No Data Found',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
