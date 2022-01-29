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
                    </td>


                </tr>
            </table>
        </div>
        <div class="student-details">
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
                                    <td>{{ $employeeData->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Father Name</td>
                                    <td>{{ $employeeData->fname }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Mother Name</td>
                                    <td>{{ $employeeData->mname }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Date of Birth</td>
                                    <td>{{ date('d-m-Y', strtotime($employeeData->dob)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Address</td>
                                    <td>{{ $employeeData->address }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Gender</td>
                                    <td>{{ $employeeData->gender }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Religion</td>
                                    <td>{{ $employeeData->religion }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Mobile</td>
                                    <td>{{ $employeeData->mobile }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Email</td>
                                    <td>{{ $employeeData->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>ID No</td>
                                    <td>{{ $employeeData->id_no }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Designation</td>
                                    <td>{{ $employeeData->designation['name'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Date of Joinning</td>
                                    <td>{{ date('d-m-Y', strtotime($employeeData->joindate)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">13</th>
                                    <td>Salary</td>
                                    <td>{{ $employeeData->salary }} </td>
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
