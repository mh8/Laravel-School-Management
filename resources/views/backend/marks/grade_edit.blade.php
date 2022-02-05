@section('title')
Edit Grade Marks
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
                    <h5 class="card-title">Edit Grade Marks</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('marks.grade.update', $marks_grade->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="grade_name"><strong>Letter Grade</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="grade_name" class="form-control" id="grade_name" value="{{ $marks_grade->grade_name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="grade_point"><strong>Grade Point</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="grade_point" class="form-control" id="grade_point" value="{{ $marks_grade->grade_point }}">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="start_marks"><strong>Start Marks</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="start_marks" class="form-control" id="start_marks" value="{{ $marks_grade->start_marks }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_marks"><strong>End Marks</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="end_marks" class="form-control" id="end_marks" value="{{ $marks_grade->end_marks }}">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="start_point"><strong>Start Point</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="start_point" class="form-control" id="start_point" value="{{ $marks_grade->start_point }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="end_point"><strong>End Point</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="end_point" class="form-control" id="end_point" value="{{ $marks_grade->end_point }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="remarks"><strong>Remarks</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="remarks" class="form-control" id="remarks" value="{{ $marks_grade->remarks }}">
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
