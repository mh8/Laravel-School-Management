<?php

namespace App\Http\Controllers\backend\Account;

use App\Http\Controllers\Controller;
use App\Models\OtherAccountCost;
use Illuminate\Http\Request;

class OtherAccountController extends Controller
{
    //
    public function AccountOtherView()
    {
        $data = OtherAccountCost::orderBy('id', 'desc')->get();
        return view('backend.account.other_account.other_account_view', compact('data'));
    }

    //
    public function AccountOtherCreate()
    {
        return view('backend.account.other_account.other_account_create');
    }

    //
    public function AccountOtherStore(Request $request)
    {
        $request->validate([
            'amount' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cost = new OtherAccountCost();
        $cost->amount = $request->amount;
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = date('YmdH') . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/other_account_cost'), $file_name);
            $cost->image = $file_name;
            $cost->save();
        }
        $notification = array(
            'message' => 'Successfully Data Inserted',
            'alert-type' => 'success'
        );
        return redirect()->route('account.other.view')->with($notification);
    }

    //
    public function AccountOtherEdit($id)
    {
        $acct['data'] = OtherAccountCost::find($id);
        return view('backend.account.other_account.other_account_edit', $acct);
    }

    //
    public function AccountOtherUpdate(Request $request, $id)
    {
        $cost = OtherAccountCost::find($id);
        $cost->amount = $request->amount;
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->description = $request->description;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('uploads/other_account_cost/' . $cost->image));
            $file_name = date('YmdH') . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/other_account_cost'), $file_name);
            $cost->image = $file_name;
        }
        $cost->save();
        $notification = array(
            'message' => 'Successfully Data Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('account.other.view')->with($notification);
    }

    public function AccountOtherDelete($id)
    {
        $cost = OtherAccountCost::find($id);
        @unlink(public_path('uploads/other_account_cost/' . $cost->image));
        $cost->delete();
        $notification = array(
            'message' => 'Successfully Data Deleted',
            'alert-type' => 'success'
        );
        return redirect()->route('account.other.view')->with($notification);
    }
}
