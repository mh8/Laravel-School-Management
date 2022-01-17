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
        $fee_category_amounts = FeeCategoryAmount::all();
        return view('backend.setup.fee_category_amount.view_fee_amount', compact('fee_category_amounts'));
    }
    public function CreateFeeAmount()
    {
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();
        return view('backend.setup.fee_category_amount.create_fee_amount', $data);
    }
}
