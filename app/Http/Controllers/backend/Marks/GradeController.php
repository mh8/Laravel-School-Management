<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //
    public function MarksGradeView()
    {
        $data['marks_grade'] = MarksGrade::all();
        return view('backend.marks.grade_view', $data);
    }

    //
    public function MarksGradeCreate()
    {
        return view('backend.marks.grade_create');
    }

    //
    public function MarksGradeStore(Request $request)
    {
        $data = new MarksGrade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();

        $notification = array(
            'message' => 'Grade Marks Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.grade.view')->with($notification);
    }

    //
    public function MarksGradeEdit($id)
    {
        $data['marks_grade'] = MarksGrade::find($id);
        return view('backend.marks.grade_edit', $data);
    }

    //
    public function MarksGradeUpdate(Request $request, $id)
    {
        $data = MarksGrade::find($id);
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();

        $notification = array(
            'message' => 'Grade Marks Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.grade.view')->with($notification);
    }

    //
    public function MarksGradeDelete($id)
    {
        $data = MarksGrade::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Grade Marks Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.grade.view')->with($notification);
    }
}
