<?php

namespace App\Http\Controllers\backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class StudentIdCardController extends Controller
{
    //
    public function StudentIdCardView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.report.student_id_card.student_id_card_view', $data);
    }

    //
    public function StudentIdCardGetStudents(Request $request)
    {

        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $students = AssignStudent::with('student')
            ->with('student_class')
            ->where('year_id', $year_id)
            ->where('class_id', $class_id)
            ->get();
        // dd($students);

        return response()->json($students);
    }

        // $check_data = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->first();
        // if ($check_data == true) {
        //     $data['allData'] = AssignStudent::where('year_id', $year_id)->where('class_id', $class_id)->get();
        //     // dd($data['allData']);
        //     $pdf = PDF::loadView('backend.report.student_id_card.student_id_card_pdf', $data);
        //     $pdf->SetProtection(['copy', 'print'], '', 'pass');
        //     return $pdf->stream('student_id_card.pdf');
        // }else{
        //     $notification = array(
        //         'message' => 'No Data Found',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }

    public function StudentIdCardPdf(Request $request,$id)
    {
        $data['allData'] = AssignStudent::where('student_id', $request->id)->first();
        // dd($data['allData']);
        $pdf = PDF::loadView('backend.report.student_id_card.student_id_card_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('student_id_card.pdf');
    }
}
