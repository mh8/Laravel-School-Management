<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MonthlyFeeController extends Controller
{
    public function MonthlyFeeView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.monthly_fee.monthly_fee_view', $data);
    }

    public function MonthlyFeeClasswise(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if($year_id != '')
        {
            $where[] = ['year_id', 'like', $year_id.'%'];
        }
        if($class_id != '')
        {
            $where[] = ['class_id', 'like', $class_id.'%'];
        }
    }
}
