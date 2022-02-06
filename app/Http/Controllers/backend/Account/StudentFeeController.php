<?php

namespace App\Http\Controllers\backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use App\Models\AssignStudent;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    //
    public function StudentFeeView()
    {
        $data['allData'] = AccountStudentFee::all();
        return view('backend.account.student_fee.student_fee_view', $data);
    }

    //
    public function StudentFeeCreate()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.account.student_fee.student_fee_create', $data);
    }

    //
    public function StudentFeeGetStudents(Request $request)
    {
        $year_id =$request->year_id;
        $class_id =$request->class_id;
        $fee_category_id =$request->fee_category_id;
        $date = date('Y-m', strtotime($request->date));

        $data = AssignStudent::with(['discount'])->where('year_id', $year_id)->where('class_id', $class_id)->get();

        $html['thsource'] = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee</th>';
        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Fee (Student)</th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach($data as $key => $value){
            $registration_fee = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->where('class_id', $value->class_id)->first();
            // dd($registration_fee);
            $accountstudentsfee = AccountStudentFee::where('student_id', $value->student_id)->where('year_id', $value->year_id)->where('class_id', $value->class_id)->where('fee_category_id', $fee_category_id)->where('date', $date)->first();

            if ($accountstudentsfee != null) {
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $color = 'success';
            $html[$key]['tdsource'] = '<td>'.$value['student']['id_no'].'<input type="hidden" name="fee_category_id" value="'.$fee_category_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['student']['name'].'<input type="hidden" name="year_id" value="'.$value->year_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['student']['fname'].'<input type="hidden" name="class_id" value="'.$value->class_id.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registration_fee->amount.'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value['discount']['discount'].'%'.'</td>';

            $original_fee = $registration_fee->amount;
            $discount = $value['discount']['discount'];
            $discount_amount = $discount / 100 * $original_fee;
            $final_fee = (int)$original_fee - (int)$discount_amount;

            $html[$key]['tdsource'] .= '<td>'.'<input type="text" name="amount[]" class="form-control" readonly value="'.$final_fee.'">'.'</td>';
            $html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="student_id[]" value="'.$value->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="id{{$key}}" class="form-check" value="'.$key.'" '.$checked.'>'.'<lable for="id{{$key}}"></label>'.'</td>';
        }
        return response()->json(@$html);
    }

    //
    public function StudentFeeStore(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        AccountStudentFee::where('year_id', $request->year_id)->where('class_id', $request->class_id)->where('fee_category_id', $request->fee_category_id)->where('date', $date)->delete();

        $check_data = $request->checkmanage;

        if ($check_data != null) {
            for ($i=0; $i < count($check_data) ; $i++) { 
                $data = new AccountStudentFee();
                $data->student_id = $request->student_id[$check_data[$i]];
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->fee_category_id = $request->fee_category_id;
                $data->date = $date;
                $data->amount = $request->amount[$check_data[$i]];
                $data->save();
            }
        }
        if (!empty(@$data)||empty($check_data)) {
            $notification = array(
                'message' => 'Successfully Data Inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('student.fee.view')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->route('student.fee.view')->with($notification);
        }
    }

}
