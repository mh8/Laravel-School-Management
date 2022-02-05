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
}
