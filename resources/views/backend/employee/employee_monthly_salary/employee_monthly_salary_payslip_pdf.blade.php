<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee Salary Details</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <table class="table table-bordered">
                <tr>
                    <th width="20%">
                        <h1>Your School logo</h1>
                    </th>
                    <td>
                        <h1>Your School</h1>
                        <h3>School Address</h3>
                        <p>Phone: 01454658878</p>
                        <p>Email: yourschoolemail@gmail.com</p>
                        <p>Employee Monthly Salary</p>
                    </td>
                </tr>
            </table>
        </div>
        @php
        $date = date('Y-m', strtotime($details['0']->date));
        if($date != '')
        {
        $where[] = ['date', 'like', $date.'%'];
        }
        $totalattend = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $details['0']->employee_id)->get();

        $salary = (float)$details['0']['user']['salary'];
        $salaryperday = (float)$salary / 30;
        $absentcount = count($totalattend->where('attend_status', 'Absent'));
        $totalsalaryminus = (float)$absentcount * (float)$salaryperday;
        $totalsalary = (float)$salary - (float)$totalsalaryminus;
        @endphp
        <div class="employee-details">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bd-example">
                        <table class="table table-bordered table-striped styled-table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Employee Details</th>
                                    <th scope="col">Employee Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Name</td>
                                    <td>{{ $details['0']['user']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Basic Salary</td>
                                    <td>{{ $details['0']['user']['salary'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Total Absent</td>
                                    <td>{{ $absentcount }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Month</td>
                                    <td>{{ date('M-Y', strtotime($details['0']->date)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Salary This Month</td>
                                    <td>{{ $totalsalary }}</td>
                                </tr>
                            </tbody>

                        </table>
                        <i style="font-size: 10px;">Print date: {{ date("d M Y") }}</i>
                    </div>
                </div>
            </div>
        </div>
        <div class="employee-details">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bd-example">
                        <table class="table table-bordered table-striped styled-table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Employee Details</th>
                                    <th scope="col">Employee Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Name</td>
                                    <td>{{ $details['0']['user']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Basic Salary</td>
                                    <td>{{ $details['0']['user']['salary'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Total Absent</td>
                                    <td>{{ $absentcount }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Month</td>
                                    <td>{{ date('M-Y', strtotime($details['0']->date)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Salary This Month</td>
                                    <td>{{ $totalsalary }}</td>
                                </tr>
                            </tbody>

                        </table>
                        <i style="font-size: 10px;">Print date: {{ date("d M Y") }}</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>