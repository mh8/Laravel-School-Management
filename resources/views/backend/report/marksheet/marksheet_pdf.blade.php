@section('title')
Student Marks Entry
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Search</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            Your School Logo
                        </div>
                        <div class="col-md-6">
                            <h4>Your School</h4>
                            <p>
                                <strong>Address:</strong>
                                <br>
                                <strong>Phone:</strong>
                                <br>
                                <strong>Email:</strong>
                                <br>
                                <strong>Academic Transcript</strong>
                                <br>
                                <strong>{{ $allMarks['0']['exam_type']['name'] }}</strong>
                                <br>
                            </p>
                            <h5></h5>
                        </div>
                    </div>
                    <hr>
                    <p style="text-align: right;"><i>Print Date: </i>{{ date('d M Y') }}</p>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                @php
                                $assign_student = App\Models\AssignStudent::where('year_id', $allMarks['0']->year_id)->where('class_id', $allMarks['0']->class_id)->first();
                                @endphp
                                <tr>
                                    <td>Student ID</td>
                                    <td>{{ $allMarks['0']['id_no'] }}</td>
                                </tr>
                                <tr>
                                    <td>Student Name</td>
                                    <td>{{ $allMarks['0']['student']['name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Class</td>
                                    <td>{{ $allMarks['0']['student_class']['name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Roll</td>
                                    <td>{{ $assign_student->roll }}</td>
                                </tr>
                                <tr>
                                    <td>Session</td>
                                    <td>{{ $allMarks['0']['year']['year'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table">
                                <thead>
                                    <th>Letter Grade</th>
                                    <th>Marks Interval</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>
                                    @foreach ($allGrades as $grade)
                                    <tr>
                                        <td>{{ $grade->grade_name }}</td>
                                        <td>{{ $grade->start_marks }} - {{ $grade->end_marks }}</td>
                                        <td>{{ $grade->start_point }} - {{ $grade->end_point }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <th>Sl</th>
                                    <th>Subject</th>
                                    <th>Full Marks</th>
                                    <th>Pass Marks</th>
                                    <th>Obtained Marks</th>
                                    <th>Grade</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>
                                    @php
                                    $total_marks = 0;
                                    $total_grade_point = 0;
                                    @endphp
                                    @foreach ($allMarks as $key => $mark)
                                    @php
                                        $obtained_marks = $mark->marks;
                                        $total_marks = (float)$total_marks + (float)$obtained_marks;
                                        $total_subject = App\Models\StudentMarks::where('year_id', $mark->year_id)->where('class_id', $mark->class_id)->where('exam_type_id', $mark->exam_type_id)->where('student_id', $mark->student_id)->get()->count();
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $mark['assign_subject']['subject']['name'] }}</td>
                                        <td>{{ $mark['assign_subject']['full_mark'] }}</td>
                                        <td>{{ $mark['assign_subject']['pass_mark'] }}</td>
                                        <td>{{ $obtained_marks }}</td>
                                    @php
                                        $grade = App\Models\MarksGrade::where([['start_marks', '<=', (int)$obtained_marks], ['end_marks', '>=', (int)$obtained_marks]])->first();
                                        $grade_name = $grade->grade_name;
                                        $grade_point = $grade->grade_point;
                                        $total_grade_point = (float)$total_grade_point + (float)$grade_point;
                                    @endphp
                                        <td>{{ $grade_name }}</td>
                                        <td>{{ $grade_point }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right;">Total Marks</td>
                                        <td>{{ $total_marks }}</td>
                                        <td colspan="" style="text-align: right;">Total Grade Point</td>
                                        <td>{{ $total_grade_point }}</td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="3" style="text-align: right;">Total Grade Point</td>
                                        <td>{{ $total_grade_point }}</td>
                                        <td colspan="3"></td>
                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table">
                                @php
                                    $total_grade = 0;
                                    $point_for_letter_grade = (float)$total_grade_point/(float)$total_subject;
                                    $total_grade = App\Models\MarksGrade::where([['start_point', '<=', (int)$point_for_letter_grade], ['end_point', '>=', (int)$point_for_letter_grade]])->first();
                                    $gpa = (float)$total_grade_point/(float)$total_subject;
                                @endphp
                                <tr>
                                    <td>Result</td>
                                    <td>@if ($count_fail > 0) Fail @else Pass @endif</td>
                                </tr>
                                <tr>
                                    <td>GPA</td>
                                    <td>@if ($count_fail > 0) 0 @else {{ number_format($gpa,2) }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Letter Grade</td>
                                    <td>@if ($count_fail > 0) F @else {{ $total_grade->grade_name }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Total Marks</td>
                                    <td>{{ $total_marks }}</td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td>@if ($count_fail > 0) '' @else {{$total_grade->remarks}} @endif</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
