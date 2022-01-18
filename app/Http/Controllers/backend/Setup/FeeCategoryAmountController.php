<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class FeeCategoryAmountController extends Controller
{
    public function ViewFeeAmount()
    {
        // $fee_category_amounts = FeeCategoryAmount::all();
        $fee_category_amounts = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_category_amount.view_fee_amount', compact('fee_category_amounts'));
    }
    public function CreateFeeAmount()
    {
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.setup.fee_category_amount.create_fee_amount', $data);
    }
    public function StoreFeeAmount(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_category_amount = new FeeCategoryAmount();
                $fee_category_amount->fee_category_id = $request->fee_category_id;
                $fee_category_amount->class_id = $request->class_id[$i];
                $fee_category_amount->amount = $request->amount[$i];
                $fee_category_amount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }
    public function EditFeeAmount($fee_category_id)
    {
        $data['alldata'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.setup.fee_category_amount.edit_fee_amount', $data);
    }
    public function UpdateFeeAmount(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'No Class Amount Selected',
                'alert-type' => 'danger'
            );
            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
        } else {
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            for ($i = 0; $i < $countClass; $i++) {
                $fee_category_amount = new FeeCategoryAmount;
                $fee_category_amount->fee_category_id = $request->fee_category_id;
                $fee_category_amount->class_id = $request->class_id[$i];
                $fee_category_amount->amount = $request->amount[$i];
                $fee_category_amount->save();
            }
            $notification = array(
                'message' => 'Fee Amount Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('fee.amount.view')->with($notification);
        }
    }
    public function DetailsFeeAmount($fee_category_id)
    {
        $data['alldata'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.setup.fee_category_amount.details_fee_amount', $data);
    }
    public function DeleteFeeAmount($id)
    {
        $fee_category_amount = FeeCategoryAmount::find($id);
        $fee_category_amount->delete();

        $notification = array(
            'message' => 'Fee Amount Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }
}
