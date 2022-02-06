<?php

namespace App\Http\Controllers\backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class AccountSalaryController extends Controller
{
    //
    public function AccountSalaryView()
    {
        $data = AccountEmployeeSalary::all();
        return view('backend.account.employee_salary.employee_salary_view', compact('data'));
    }

    //
    public function AccountSalaryCreate()
    {
        return view('backend.account.employee_salary.employee_salary_create');
    }

    //
    public function AccountSalaryStore(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

        AccountEmployeeSalary::where('date', $date)->delete();

        $check_data = $request->checkmanage;

        if ($check_data != null) {
            for ($i = 0; $i < count($check_data); $i++) {
                $data = new AccountEmployeeSalary();
                $data->employee_id = $request->employee_id[$check_data[$i]];
                $data->date = $date;
                $data->amount = $request->amount[$check_data[$i]];
                $data->save();
            }
        }
        if (!empty(@$data) || empty($check_data)) {
            $notification = array(
                'message' => 'Successfully Data Inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('account.salary.view')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->route('account.salary.view')->with($notification);
        }
    }

    //
    public function AccountSalaryGetEmployee(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }
        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

        $html['thsource'] = '<th>Sl</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary This Month</th>';
        $html['thsource'] .= '<th>Select</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($data as $key => $attend) {
            $account_salary = AccountEmployeeSalary::where('employee_id', $attend->employee_id)->where('date', $date)->first();

            if ($account_salary != null) {
                $checked = '';
            } else {
                $checked = 'checked';
            }
            $totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status', 'Absent'));
            $color = 'success';

            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['id_no'] . '<input type="hidden" name="date" value="' . $date . '">' . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['salary'] . '</td>';
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary / 30;
            $totalsalaryminus = (float)$absentcount * (float)$salaryperday;
            $totalsalary = (float)$salary - (float)$totalsalaryminus;

            $html[$key]['tdsource'] .= '<td>' . $totalsalary . '<input type="hidden" name="amount[]" value="' . $totalsalary . '">' . '</td>';
            $html[$key]['tdsource'] .= '<td>' . '<input type="hidden" name="employee_id[]" value="' . $attend->employee_id . '">' . '<input type="checkbox" name="checkmanage[]" id="id{{$key}}" class="form-check" value="' . $key . '" ' . $checked . '>' . '<lable for="id{{$key}}"></label>' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-' . $color . '" title="Payslip" target="_blank" href="' . route("employee.monthly.salary.payslip", $attend->employee_id) . '">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }
}
