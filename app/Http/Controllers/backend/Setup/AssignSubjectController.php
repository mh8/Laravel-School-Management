<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView()
    {
        $assign_subjects = AssignSubject::all();
        return view('backend.setup.assign_subject.view_assign_subject', compact('assign_subjects'));
    }
    public function AssignSubjectCreate()
    {
        $alldata['subjects'] = SchoolSubject::all();
        $alldata['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.create_assign_subject', $alldata);
    }
    public function AssignSubjectStore(Request $request)
    {
        $subject_count = count($request->subject_id);
        if($subject_count != NULL){
            for($i=0; $i<$subject_count; $i++){
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
        }
        $notfication = array(
            'message' => 'Assign Subject Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('assign.subject.view')->with($notfication);
    }
    public function AssignSubjectEdit()
    {

    }
    public function AssignSubjectUpdate()
    {

    }
    public function AssignSubjectDelete()
    {

    }
}
