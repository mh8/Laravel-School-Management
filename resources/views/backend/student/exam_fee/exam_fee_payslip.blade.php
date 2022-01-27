<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Details</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');


        body{
            font-family: 'Roboto', sans-serif;
        }
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: 'Roboto', sans-serif;
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
            <table class="table table-bordered styled-table">
                <tr>
                    <th width="20%">
                        <h1>Your School logo</h1>
                    </th>
                    <td>
                        <h1>Your School</h1>
                        <h3>School Address</h3>
                        <p>Phone: 01454658878</p>
                        <p>Email: yourschoolemail@gmail.com</p>
                        <p><strong>Exam Fee PAY Slip</strong> </p>
                    </td>
                </tr>
            </table>
        </div>

        @php
        $registration_fee = \App\Models\FeeCategoryAmount::where('fee_category_id', 3)
        ->where('class_id', $details->class_id)
        ->first();
        $originalFee = $registration_fee->amount;
        $discount = $details['discount']['discount'];
        $discountableFee = $discount/100*$originalFee;
        $totalFee = (float)$originalFee - (float)$discountableFee;
        @endphp

        <div class="student-details">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bd-example">
                        <table class="table table-bordered table-striped styled-table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Student Details</th>
                                    <th scope="col">Student Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ID No</td>
                                    <td>{{ $details['student']['id_no'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Roll</td>
                                    <td>{{ $details->roll }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Name</td>
                                    <td>{{ $details['student']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Father's Name</td>
                                    <td>{{ $details['student']['fname'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Session</td>
                                    <td>{{ $details['student_year']['year'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Class</td>
                                    <td>{{ $details['student_class']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Exam Fee</td>
                                    <td>{{ $originalFee }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Discount</td>
                                    <td>{{ $discount }} %</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Fee For this Student of {{ $exam }}</td>
                                    <td>{{ $totalFee }}</td>
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
