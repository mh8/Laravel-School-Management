<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    //
    public function EmployeeSalaryView()
    {
        $data['allData'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_salary.salary_view', $data);
    }

    //
    public function EmployeeSalaryIncrement($id)
    {
        $data['allData'] = User::find($id);
        return view('backend.employee.employee_salary.salary_increment', $data);
    }

    //
    public function EmployeeSalaryStore(Request $request, $id)
    {
        // $request->validate([
        //     'salary' => 'required',
        // ]);

        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d', strtotime($request->effected_date));
        $salaryData->save();

        $notification = array(
            'message' => 'Employee Salary Increment Successfull',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.salary.view')->with($notification);
    }

    //
    public function EmployeeSalaryDetails($id)
    {
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id', $data['details']->id)->get();

        return view('backend.employee.employee_salary.salary_details', $data);
    }
}
