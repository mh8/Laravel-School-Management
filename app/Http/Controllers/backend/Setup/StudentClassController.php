<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function StudentClassView()
    {
        $studentClasses = StudentClass::all();
        return view('backend.setup.student_class.view_class', compact('studentClasses'));
    }
    public function StudentClassCreate()
    {
        return view('backend.setup.student_class.create_class');
    }
    public function StudentClassStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);
        $studentClass = new StudentClass();
        $studentClass->name = $request->name;
        $studentClass->save();

        $notification = array(
            'message' => 'Student Class Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
    public function StudentClassEdit($id)
    {
        $studentClass = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('studentClass'));
    }
    public function StudentClassUpdate(Request $request, $id)
    {
        $studentClass = StudentClass::find($id);
        $request->validate([
            'name' => 'required|unique:student_classes,name,' . $studentClass->id,
        ]);
        $studentClass->name = $request->name;
        $studentClass->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassDelete($id)
    {
        $studentClass = StudentClass::find($id);
        $studentClass->delete();

        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
