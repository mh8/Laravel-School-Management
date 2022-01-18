<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ExamTypeView()
    {
        $examTypes = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', compact('examTypes'));
    }
    public function ExamTypeCreate()
    {
        return view('backend.setup.exam_type.create_exam_type');
    }
    public function ExamTypeStore()
    {
        $validation = request()->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        $examType = new ExamType();
        $examType->name = request('name');
        $examType->save();
        $notification = array(
            'message' => 'Exam Type Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function ExamTypeEdit($id)
    {
        $examType = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('examType'));
    }
    public function ExamTypeUpdate(Request $request, $id)
    {
        $examType = ExamType::find($id);
        $validation = request()->validate([
            'name' => 'required|unique:exam_types,name,' . $examType->id,
        ]);
        
        $examType->name = $request->name;
        $examType->save();
        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function ExamTypeDelete($id)
    {
        $examType = ExamType::find($id);
        $examType->delete();
        $notification = array(
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
}
