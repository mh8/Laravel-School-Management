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
        $student_fee = App\Models\AccountStudentFee::whereBetween('date', [$start_date, $end_date])->sum('amount');
        $other_cost = App\Models\OtherAccountCost::whereBetween('date', [$sdate, $edate])->sum('amount');
        $employee_salary = App\Models\OtherAccountCost::whereBetween('date', [$sdate, $edate])->sum('amount');
        $totalcost = $other_cost + $employee_salary;
        $profit = $student_fee - $totalcost;
        @endphp
        <div class="employee-details">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bd-example">
                        <table class="table table-bordered table-striped styled-table">
                            <tr>
                                <td colspan="3" style="text-align: center;">
                                    Reporting Date: {{date('d-M-Y', strtotime($sdate))}} to {{date('d-M-Y', strtotime($edate))}}
                                </td>
                            </tr>
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Student Fee</td>
                                    <td>{{ $student_fee }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Employee Salary</td>
                                    <td>{{ $employee_salary }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Other Cost</td>
                                    <td>{{ $other_cost }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Total Cost</td>
                                    <td>{{ $totalcost }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Profit</td>
                                    <td>{{ $profit }}</td>
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
