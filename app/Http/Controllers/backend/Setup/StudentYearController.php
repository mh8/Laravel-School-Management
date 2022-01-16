<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function StudentYearView()
    {
        $studentYears = StudentYear::all();
        return view('backend.setup.student_year.view_year', compact('studentYears'));
    }
    public function StudentYearCreate()
    {
        return view('backend.setup.student_year.create_year');
    }
    public function StudentYearStore(Request $request)
    {
        $request->validate([
            'year' => 'required|unique:student_years,year',
        ]);
        $studentYear = new StudentYear();
        $studentYear->year = $request->year;
        $studentYear->save();
        $notification = array(
            'message' => 'Student Year Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function StudentYearEdit($id)
    {
        $studentYear = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year', compact('studentYear'));
    }
    public function StudentYearUpdate(Request $request, $id)
    {
        $studentYear = StudentYear::find($id);
        $request->validate([
            'year' => 'required|unique:student_years,year,' . $id,
        ]);
        
        $studentYear->year = $request->year;
        $studentYear->save();
        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id)
    {
        $studentYear = StudentYear::find($id);
        $studentYear->delete();
        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
}
