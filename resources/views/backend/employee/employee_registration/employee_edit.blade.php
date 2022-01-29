@section('title')
Edit Employee Information
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
                    <h5 class="card-title">Edit Employee Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee.registration.update', $employeeData->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="employee_name"><strong>Employee Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="employee_name" class="form-control" id="employee_name" value="{{ $employeeData->name }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="father_name"><strong>Father's Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="father_name" class="form-control" id="father_name" value="{{ $employeeData->fname }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mother_name"><strong>Mother's Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mother_name" class="form-control" id="mother_name" value="{{ $employeeData->mname }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="mobile"><strong>Mobile</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mobile" class="form-control" id="mobile" value="{{ $employeeData->mobile }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email"><strong>Email</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ $employeeData->email }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="mname"><strong>Gender</strong> <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" {{ ($employeeData->gender == 'Male') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" {{ ($employeeData->gender == 'Female') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Others" {{ ($employeeData->gender == 'Others') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="address"><strong>Address</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ $employeeData->address }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="religion"><strong>Religion</strong> <span class="text-danger">*</span></label>
                                <select name="religion" id="religion" class="select2-single form-control">
                                    <option value="Islam" {{ ($employeeData->religion == 'Islam') ? 'selected' : '' }}>Islam</option>
                                    <option value="Hindu" {{ ($employeeData->religion == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddhist" {{ ($employeeData->religion == 'Buddhist') ? 'selected' : '' }}>Buddhist</option>
                                    <option value="Christian" {{ ($employeeData->religion == 'Christian') ? 'selected' : '' }}>Christian</option>
                                    <option value="Others" {{ ($employeeData->religion == 'Others') ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dob"><strong>Date of Birth</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="dob" class="form-control" id="dob" value="{{ $employeeData->dob }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="designation_id"><strong>Designation</strong> <span class="text-danger">*</span></label>
                                <select name="designation_id" class="select2-single form-control" id="designation_id">
                                    <option value="">Select</option>
                                    @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}" {{ ($employeeData->designation_id == $designation->id) ? 'selected':'' }}>{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if(!@employeeData)
                            <div class="form-group col-md-4">
                                <label for="salary"><strong>Salary</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="salary" class="form-control" id="salary" value="{{ $employeeData->salary }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="join_date"><strong>Date of Joinning</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="join_date" class="form-control" id="join_date" value="{{ $employeeData->joindate }}">
                            </div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="class"><strong>Profile Picture</strong> <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" id="image" onchange="preview()">
                            </div>
                            <div class="form-group col-md-4">
                                <img src="{{ (!empty($employeeData->image))? url('uploads/employee_images/'.$employeeData->image) : url('uploads/no_image.jpg') }}" alt="user-img" style="width: 300px;" id="showImage">
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
