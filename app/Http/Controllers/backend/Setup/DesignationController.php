<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function DesignationView()
    {
        $designations = Designation::all();
        return view('backend.setup.designation.designation_view', compact('designations'));
    }
    public function DesignationCreate()
    {
        return view('backend.setup.designation.designation_create');
    }
    public function DesignationStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name',
        ]);
        $designation = new Designation();
        $designation->name = $request->name;
        $designation->save();
        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
    public function DesignationEdit($id)
    {
        $designation = Designation::find($id);
        return view('backend.setup.designation.designation_edit', compact('designation'));
    }
    public function DesignationUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:designations,name,' . $id,
        ]);
        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->save();
        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
    public function DesignationDelete($id)
    {
        $designation = Designation::find($id);
        $designation->delete();
        $notification = array(
            'message' => 'Designation Deleted Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
}
