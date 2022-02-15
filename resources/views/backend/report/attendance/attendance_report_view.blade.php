@section('title')
Employee Attendance Report
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
                    <h5 class="card-title">Employee Search</h5>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('report.attendance.getemployee') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="employee_id"><strong>Year</strong></label>
                                <select id="employee_id" name="employee_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date"><strong>Date</strong> </label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
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
