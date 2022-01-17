<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function FeeCategoryView()
    {
        $feeCategories = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category', compact('feeCategories'));
    }
    public function FeeCategoryCreate()
    {
        return view('backend.setup.fee_category.create_fee_category');
    }
    public function FeeCategoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:fee_categories',
        ]);
        $feeCategory = new FeeCategory();
        $feeCategory->name = $request->name;
        $feeCategory->save();

        $notification = array(
            'message' => 'Fee Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function FeeCategoryEdit($id)
    {
        $feeCategory = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category', compact('feeCategory'));
    }
    public function FeeCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:fee_categories,name,' . $id,
        ]);
        $feeCategory = FeeCategory::find($id);
        $feeCategory->name = $request->name;
        $feeCategory->save();
        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function FeeCategoryDelete($id)
    {
        $feeCategory = FeeCategory::find($id);
        $feeCategory->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }

}
