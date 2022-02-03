@section('title')
Add Attendance
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Select2 css -->
<link href="{{ asset('backend/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Tagsinput css -->
<link href="{{ asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" />
<!-- Datepicker css -->
<link href="{{ asset('backend/assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
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
                    <form action="{{ route('employee.leave.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="attendance_date"><strong>Attendance Date</strong> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                <input type="text" placeholder="dd/mm/yyyy" name="attendance_date" class="datepicker-here form-control" id="attendance_date" aria-describedby="basic-addon3">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon3"><i class="feather icon-calendar"></i></span>
                                </div>
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
                                                        <input name="attendance_status{{$key}}" type="radio" id="present{{$key}}" value="Present">
                                                        <label for="present{{$key}}">Present</label>
                                                    </div>
                                                    <div class="form-check-inline radio-danger">
                                                        <input name="attendance_status{{$key}}" type="radio" id="absent{{$key}}" value="Absent">
                                                        <label for="absent{{$key}}">Absent</label>
                                                    </div>

                                                    <div class="form-check-inline radio-info">
                                                        <input name="attendance_status{{$key}}" type="radio" id="leave{{$key}}" value="Leave">
                                                        <label for="leave{{$key}}">Leave</label>
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
<!-- Datepicker JS -->
<script src="{{ asset('backend/assets/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/custom-form-datepicker.js') }}"></script>

<script>
    $(document).ready(function() {
        $(document).on('change', '#leave_purpose_id', function() {
            var leave_purpose_id = $(this).val();
            if (leave_purpose_id == 0) {
                $('#add_other').show();
            } else {
                $('#add_other').hide();
            }
        });
    });
</script>
@endsection