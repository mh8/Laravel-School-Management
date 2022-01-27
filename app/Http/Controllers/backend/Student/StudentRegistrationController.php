<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
class StudentRegistrationController extends Controller
{
    // Student View
    public function StudentRegistrationView()
    {
        $students['years'] = StudentYear::all();
        $students['classes'] = StudentClass::all();

        $students['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $students['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        // dd($students);
        $students['students'] = AssignStudent::where('year_id', $students['year_id'])->where('class_id', $students['class_id'])->get();
        // dd($students);
        return view('backend.student.student_registration.student_view', $students);
    }

    // Student Registration
    public function StudentRegistrationCreate()
    {
        $students['years'] = StudentYear::all();
        $students['classes'] = StudentClass::all();
        $students['groups'] = StudentGroup::all();
        $students['shifts'] = StudentShift::all();

        return view('backend.student.student_registration.student_create', $students);
    }

    // Student Registration Store
    public function StudentRegistrationStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $checkYear = StudentYear::find($request->year_id)->year;
            $student = User::where('usertype', 'student')->orderBy('id', 'desc')->first();
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '1000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '100' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '10' . $studentId;
                } elseif ($studentId < 10000) {
                    $id_no = '1' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'student')->orderBy('id', 'desc')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '1000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '100' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '10' . $studentId;
                } elseif ($studentId < 10000) {
                    $id_no = '1' . $studentId;
                }
            }
            $final_id = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id;
            $user->name = $request->student_name;
            $user->password = bcrypt($code);
            $user->usertype = 'student';
            $user->code = $code;
            $user->fname = $request->father_name;
            $user->mname = $request->mother_name;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->mobile = $request->mobile;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->roll = $request->roll;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = 1;
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });
        $notification = array(
            'message' => 'Student Registration Successfull',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }

    // Show Student From Search
    public function StudentYearClassWise(Request $request)
    {
        $students['years'] = StudentYear::all();
        $students['classes'] = StudentClass::all();
        $students['year_id'] = $request->year_id;
        $students['class_id'] = $request->class_id;
        $students['students'] = AssignStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return view('backend.student.student_registration.student_view', $students);
    }

    // Student Registration Edit
    public function StudentRegistrationEdit($student_id)
    {
        $students['years'] = StudentYear::all();
        $students['classes'] = StudentClass::all();
        $students['groups'] = StudentGroup::all();
        $students['shifts'] = StudentShift::all();
        $students['editData'] = AssignStudent::with('student', 'discount')->where('student_id',$student_id)->first();
        return view('backend.student.student_registration.student_edit', $students);
    }

    // Student Registration Update
    public function StudentRegistrationUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {
            //user table
            $user = User::where('id',$student_id)->first();
            $user->name = $request->student_name;
            $user->fname = $request->father_name;
            $user->mname = $request->mother_name;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->mobile = $request->mobile;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('uploads/student_images'.$user->image));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            // assign_student table
            $assign_student = AssignStudent::where('id', $request->id)->where('student_id',$student_id)->first();
            $assign_student->roll = $request->roll;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            // discount student table
            $discount_student = DiscountStudent::where('assign_student_id', $request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student Registration Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    //// Student Promotion View
    public function StudentRegistrationPromotionView($student_id)
    {
        $students['years'] = StudentYear::all();
        $students['classes'] = StudentClass::all();
        $students['groups'] = StudentGroup::all();
        $students['shifts'] = StudentShift::all();
        $students['editData'] = AssignStudent::with('student', 'discount')->where('student_id',$student_id)->first();
        return view('backend.student.student_registration.student_promotion', $students);
    }

    // Student Promotion Update
    public function StudentRegistrationPromotionUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {
            //user table
            $user = User::where('id',$student_id)->first();
            $user->name = $request->student_name;
            $user->fname = $request->father_name;
            $user->mname = $request->mother_name;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->mobile = $request->mobile;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('uploads/student_images'.$user->image));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            // assign_student table
            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->roll = $request->roll;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            // discount student table
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = 1;
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student Promotion Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }
    // Student Registration Delete
    public function StudentRegistrationDelete($student_id)
    {
        $student = User::where('id',$student_id)->first();
        @unlink(public_path('uploads/student_images'.$student->image));
        $student->delete();
        $notification = array(
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }
    public function StudentRegistrationDetails($student_id)
    {
        $data['student'] = AssignStudent::with(['student', 'discount'])->where('student_id',$student_id)->first();

        $pdf = PDF::loadView('backend.student.student_registration.student_details_pdf', $data);
        $pdf->setProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
