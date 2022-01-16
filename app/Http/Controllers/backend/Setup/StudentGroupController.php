<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function StudentGroupView()
    {
        $studentGroups = StudentGroup::all();
        return view('backend.setup.student_group.view_group', compact('studentGroups'));
    }
    public function StudentGroupCreate()
    {
        return view('backend.setup.student_group.create_group');
    }
    public function StudentGroupStore(Request $request)
    {
        $request->validate([
            'group_name' => 'required|unique:student_groups,group_name',
        ]);
        $studentGroup = new StudentGroup();
        $studentGroup->group_name = $request->group_name;
        $studentGroup->save();
        $notification = array(
            'message' => 'Student Group Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function StudentGroupEdit($id)
    {
        $studentGroup = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group', compact('studentGroup'));
    }
    public function StudentGroupUpdate(Request $request, $id)
    {
        $studentGroup = StudentGroup::find($id);
        $request->validate([
            'group_name' => 'required|unique:student_groups,group_name,' . $id,
        ]);
        
        $studentGroup->group_name = $request->group_name;
        $studentGroup->save();
        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function StudentGroupDelete($id)
    {
        $studentGroup = StudentGroup::find($id);
        $studentGroup->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
}
