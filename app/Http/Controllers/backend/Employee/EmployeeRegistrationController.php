<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class EmployeeRegistrationController extends Controller
{
    //
    public function EmployeeRegistrationView()
    {
        $data['employeeData'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_registration.employee_view', $data);
    }

    //
    public function EmployeeRegistrationCreate()
    {
        $data['designations'] = Designation::all();
        return view('backend.employee.employee_registration.employee_create', $data);
    }

    //
    public function EmployeeRegistrationStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $checkYear = date('Ym', strtotime($request->join_date));
            // dd($checkYear);
            $employee = User::where('usertype', 'employee')->orderBy('id', 'desc')->first();
            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } else {
                $employee = User::where('usertype', 'employee')->orderBy('id', 'desc')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            }

            $final_id = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id;
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->usertype = 'employee';
            $user->name = $request->employee_name;
            $user->fname = $request->father_name;
            $user->mname = $request->mother_name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->joindate = date('Y-m-d', strtotime($request->join_date));
            $user->designation_id = $request->designation_id;
            $user->salary = $request->salary;

            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/employee_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();
        });
        $notification = array(
            'messege' => 'Employee Created Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('employee.registration.view')->with($notification);
    }

    //
    public function EmployeeRegistrationEdit($id)
    {
        $data['employeeData'] = User::find($id);
        $data['designations'] = Designation::all();
        return view('backend.employee.employee_registration.employee_edit', $data);
    }
    public function EmployeeRegistrationUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->employee_name;
        $user->fname = $request->father_name;
        $user->mname = $request->mother_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->designation_id = $request->designation_id;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('uploads/employee_images/' . $user->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/employee_images'), $fileName);
            $user->image = $fileName;
        }
        $user->save();

        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('employee.registration.view')->with($notification);
    }

    //
    public function EmployeeRegistrationDetails($id)
    {
        $data['employeeData'] = User::find($id);

        $pdf = PDF::loadView('backend.employee.employee_registration.employee_details', $data);
        $pdf->setProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('employee_details.pdf');
    }
}
