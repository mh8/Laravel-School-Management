<?php

namespace App\Http\Controllers\backend\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\MarksGrade;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class ResultReportController extends Controller
{
    //
    public function StudentResultView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('backend.report.result_report.student_result_view', $data);
    }

    //
    public function ResultGet(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;
        //
        $count_fail = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->where('marks', '<', '33')->get()->count();

        $single_result = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->first();

        if ($single_result == true) {
            $allData = StudentMarks::select('year_id', 'class_id', 'exam_type_id', 'student_id')->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
            //
            $allMarks = StudentMarks::with(['assign_subject', 'year'])->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->get();
            $allGrades = MarksGrade::all();
            // dd($data['allData']->toArray());
            $pdf = PDF::loadView('backend.report.result_report.student_result_pdf', compact('allMarks', 'allData', 'allGrades', 'count_fail'));
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('student_result_report.pdf');
        }else{
            $notification = array(
                'message' => 'No Result Found!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
