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
                    <form method="GET" action="{{ route('report.marksheet.getstudents') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="year_id"><strong>Year</strong></label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="class_id"><strong>Class</strong></label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{(@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exam_type_id"><strong>Exam</strong></label>
                                <select id="exam_type_id" name="exam_type_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($exam_types as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_no"><strong>ID No</strong> </label>
                                <input type="text" name="id_no" id="id_no" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
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
