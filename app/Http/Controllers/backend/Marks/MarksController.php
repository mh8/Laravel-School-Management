<?php

namespace App\Http\Controllers\backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    //
    public function MarksAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.marks_add', $data);
    }

    //
    public function MarksStore(Request $request)
    {
        $student_count = count($request->student_id);
        if ($student_count) {
            for ($i = 0; $i < $student_count; $i++) {
                $data = new StudentMarks();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->class_id = $request->class_id;
                $data->year_id = $request->year_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->marks = $request->marks[$i];
                $data->save();
            }
        }
        $notfication = array(
            'message' => 'Marks Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.entry.add')->with($notfication);
    }

    //
    public function MarksEdit()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.marks_edit', $data);
    }

    //
    public function MarksEditGetStudents(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;

        $students = StudentMarks::with(['student'])->where('year_id', $year_id)->where('class_id', $class_id)->where('assign_subject_id', $assign_subject_id)->where('exam_type_id', $exam_type_id)->get();
        return response()->json($students);
    }

    //
    public function MarksUpdate(Request $request)
    {
        StudentMarks::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('assign_subject_id', $request->assign_subject_id)->where('exam_type_id', $request->exam_type_id)->delete();

        $student_count = count($request->student_id);
        if ($student_count) {
            for ($i = 0; $i < $student_count; $i++) {
                $data = new StudentMarks();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->class_id = $request->class_id;
                $data->year_id = $request->year_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->marks = $request->marks[$i];
                $data->save();
            }
        }
        $notfication = array(
            'message' => 'Marks Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.entry.add')->with($notfication);
    }
}
