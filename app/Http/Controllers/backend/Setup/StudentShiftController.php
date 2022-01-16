<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function StudentShiftView()
    {
        $studentShifts = StudentShift::all();
        return view('backend.setup.student_shift.view_shift', compact('studentShifts'));
    }
    public function StudentShiftCreate()
    {
        return view('backend.setup.student_shift.create_shift');
    }
    public function StudentShiftStore(Request $request)
    {
        $request->validate([
            'shift_name' => 'required|unique:student_shifts,shift_name',
            // 'shift_start_time' => 'required',
            // 'shift_end_time' => 'required',
        ]);
        $studentShift = new StudentShift();
        $studentShift->shift_name = $request->shift_name;
        // $shift->shift_start_time = $request->shift_start_time;
        // $shift->shift_end_time = $request->shift_end_time;
        $studentShift->save();
        $notification = array(
            'message' => 'Student Shift Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function StudentShiftEdit($id)
    {
        $studentShift = StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift', compact('studentShift'));
    }
    public function StudentShiftUpdate(Request $request, $id)
    {
        $studentShift = StudentShift::find($id);
        $request->validate([
            'shift_name' => 'required|unique:student_shifts,shift_name,' . $id,
            // 'shift_start_time' => 'required',
            // 'shift_end_time' => 'required',
        ]);
        
        $studentShift->shift_name = $request->shift_name;
        // $shift->shift_start_time = $request->shift_start_time;
        // $shift->shift_end_time = $request->shift_end_time;
        $studentShift->save();
        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function StudentShiftDelete($id)
    {
        $studentShift = StudentShift::find($id);
        $studentShift->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
}
