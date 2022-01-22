@section('title')
Student Promotion
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
                    <h5 class="card-title">Promote Student</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.registration.promotion.update', $editData->student_id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $editData->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="student_name"><strong>Student Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="student_name" class="form-control" id="student_name" placeholder="Enter Student Name" value="{{ $editData['student']['name'] }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="father_name"><strong>Father's Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father's Name" value="{{ $editData['student']['fname'] }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mother_name"><strong>Mother's Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother's Name" value="{{ $editData['student']['mname'] }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="mobile"><strong>Mobile</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile" value="{{ $editData['student']['mobile'] }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="address"><strong>Address</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="{{ $editData['student']['addresss'] }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mname"><strong>Gender</strong> <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" {{ ($editData['student']['gender'] == 'Male') ? "checked" : "" }}>
                                    <label class="form-check-label" for="gender">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" {{ ($editData['student']['gender'] == 'Female') ? "checked" : "" }}>
                                    <label class="form-check-label" for="gender">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Others" {{ ($editData['student']['gender'] == 'Others') ? "checked" : "" }}>
                                    <label class="form-check-label" for="gender">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="religion"><strong>Religion</strong> <span class="text-danger">*</span></label>
                                <select name="religion" id="religion" class="select2-single form-control">
                                    <option value="">Select Religion</option>
                                    <option value="Islam" {{ ($editData['student']['religion'] == 'Islam') ? "selected" : "" }}>Islam</option>
                                    <option value="Hindu" {{ ($editData['student']['religion'] == 'Hindu') ? "selected" : "" }}>Hindu</option>
                                    <option value="Buddhist" {{ ($editData['student']['religion'] == 'Buddhist') ? "selected" : "" }}>Buddhist</option>
                                    <option value="Christian" {{ ($editData['student']['religion'] == 'Christian') ? "selected" : "" }}>Christian</option>
                                    <option value="Others" {{ ($editData['student']['religion'] == 'Others') ? "selected" : "" }}>Others</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dob"><strong>Date of Birth</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="dob" class="form-control" id="dob" value="{{ $editData['student']['dob'] }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="discount"><strong>Discount</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter Discount" value="{{ $editData['discount']['discount'] }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="year_id"><strong>Year</strong> <span class="text-danger">*</span></label>
                                <select name="year_id" class="select2-single form-control" id="year_id">
                                    <option value="">Select</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="class_id"><strong>Class</strong> <span class="text-danger">*</span></label>
                                <select name="class_id" class="select2-single form-control" id="class_id">
                                    <option value="">Select</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="group_id"><strong>Group</strong> <span class="text-danger">*</span></label>
                                <select name="group_id" class="select2-single form-control" id="group_id">
                                    <option value="">Select</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id) ? "selected" : "" }}>{{ $group->group_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="shift_id"><strong>Shift</strong> <span class="text-danger">*</span></label>
                                <select name="shift_id" class="select2-single form-control" id="shift_id">
                                    <option value="">Select</option>
                                    @foreach ($shifts as $shift)
                                    <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id) ? "selected" : "" }}>{{ $shift->shift_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="roll"><strong>Roll</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="roll" class="form-control" id="roll" placeholder="Enter Roll" value="{{ $editData['student']['roll'] }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="class"><strong>Profile Picture</strong> <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" id="image" onchange="preview()">
                            </div>
                            <div class="form-group col-md-4">
                                <img src="{{ (!empty($editData['student']['image']))? url('uploads/student_images/'.$editData['student']['image']) : url('uploads/no_image.jpg') }}" alt="user-img" style="width: 300px;" id="showImage">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="feather icon-user-check mr-2"></i></i><Strong>Promote</Strong></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
<script>
    function preview() {
        showImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
@section('script')
<!-- Select2 js -->
<script src="{{ asset('backend/assets/plugins/select2/select2.min.js') }}"></script>
<!-- Tagsinput js -->
<script src="{{ asset('backend/assets/js/custom/custom-form-select.js') }}"></script>
@endsection
