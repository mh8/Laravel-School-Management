<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function SubjectView()
    {
        $subjects = SchoolSubject::all();
        return view('backend.setup.subject.view_subject', compact('subjects'));
    }
    public function SubjectCreate()
    {
        return view('backend.setup.subject.create_subject');
    }
    public function SubjectStore(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);
        $subject = new SchoolSubject();
        $subject->name = $request->name;
        $subject->save();
        $notification = array(
            'message' => 'Subject Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subject.view')->with($notification);
    }
    public function SubjectEdit($id)
    {
        $subject = SchoolSubject::find($id);
        return view('backend.setup.subject.edit_subject', compact('subject'));
    }
    public function SubjectUpdate(Request $request, $id)
    {
        $subject = SchoolSubject::find($id);
        $validation = $request->validate([
            'name' => 'required|unique:school_subjects,name,' . $subject->id,
        ]);
        $subject->name = $request->name;
        $subject->save();
        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subject.view')->with($notification);
    }
    public function SubjectDelete($id)
    {
        $subject = SchoolSubject::find($id);
        $subject->delete();
        $notification = array(
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subject.view')->with($notification);
    }
}
