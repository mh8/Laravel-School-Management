<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class ExamFeeController extends Controller
{
    public function ExamFeeView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_type'] = ExamType::all();
        return view('backend.student.exam_fee.exam_fee_view', $data);
    }
    public function ExamFeeClasswise(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($year_id != '') {
            $where[] = ['year_id', 'like', $year_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['class_id', 'like', $class_id . '%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        $html['thsource'] = '<th>Sl</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Roll</th>';
        $html['thsource'] .= '<th>Exam Fee</th>';
        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $v) {
            $registration_fee = FeeCategoryAmount::where('fee_category_id', 3)->where('class_id', $v->class_id)->first();
            $colour = 'success';

            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v->roll . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $registration_fee->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['discount']['discount'] . '%' . '</td>';

            $originalFee = $registration_fee->amount;
            $discount = $v['discount']['discount'];
            $discountableFee = $discount / 100 * $originalFee;
            $totalFee = (float)$originalFee - (float)$discountableFee;

            $html[$key]['tdsource'] .= '<td>' . $totalFee . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-' . $colour . '" title="PaySlip" target="_blank" href="' . route("exam.fee.payslip") . '?class_id=' . $v->class_id . '&student_id=' . $v->student_id . '&exam_id=' . $request->exam_id . '" >Fee Slip</a>';
            $html[$key]['tdsource'] .= '<td>';
        };
        return response()->json(@$html);
    }
    public function ExamFeePayslip(Request $request)
    {
        $class_id = $request->class_id;
        $student_id = $request->student_id;
        $exam = $request->exam_id;
        $data['exam'] = ExamType::find($exam)['name'];
        $data['details'] = AssignStudent::with(['student', 'discount'])->where('class_id', $class_id)->where('student_id', $student_id)->first();

        $pdf = PDF::loadView('backend.student.exam_fee.exam_fee_payslip', $data);
        $pdf->setProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('exam_fee_payslip.pdf');
    }
}
