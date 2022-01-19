<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\User;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function StudentRegistrationView()
    {
        $students = AssignStudent::all();
        return view('backend.student.student_registration.student_view', compact('students'));
    }
    public function StudentRegistrationCreate()
    {
        return view('backend.student.student_registration.student_create');
    }
}
