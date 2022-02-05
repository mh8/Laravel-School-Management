<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    //
    public function GetSubjects(Request $request)
    {
        $class_id = $request->class_id;
        $subjects = AssignSubject::with(['subject'])->where('class_id', $class_id)->get();
        return response()->json($subjects);
    }

    //
    public function GetStudents(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $students = AssignStudent::with(['student'])->where('year_id', $year_id)->where('class_id', $class_id)->get();
        return response()->json($students);
    }

    public function AllStudents()
    {
        $students = count(AssignStudent::all());
        return response()->json($students);
    }
}
