@section('title')
Add Attendance
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Select2 css -->
<link href="{{ asset('backend/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Tagsinput css -->
<link href="{{ asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Attendance</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee.attendance.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date"><strong>Attendance Date</strong> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <table class="table table-hover table-dark table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Employee List</th>
                                            <th>Attendance Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $key => $employee)
                                        <tr id="div{{ $employee->id }}">
                                            <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                <div class="custom-radio-button mt-3">
                                                    <div class="form-check-inline radio-success">
                                                        <input name="attendance_status{{$key}}" type="radio" id="present{{$key}}" value="Present" checked>
                                                        <label for="present{{$key}}">&nbsp;Present</label>
                                                    </div>
                                                    <div class="form-check-inline radio-danger">
                                                        <input name="attendance_status{{$key}}" type="radio" id="absent{{$key}}" value="Absent">
                                                        <label for="absent{{$key}}">&nbsp; Absent</label>
                                                    </div>

                                                    <div class="form-check-inline radio-info">
                                                        <input name="attendance_status{{$key}}" type="radio" id="leave{{$key}}" value="Leave">
                                                        <label for="leave{{$key}}">&nbsp; Leave</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<!-- Select2 js -->
<script src="{{ asset('backend/assets/plugins/select2/select2.min.js') }}"></script>
<!-- Tagsinput js -->
<script src="{{ asset('backend/assets/js/custom/custom-form-select.js') }}"></script>
@endsection
