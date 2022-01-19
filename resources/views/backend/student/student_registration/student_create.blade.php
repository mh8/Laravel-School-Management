@section('title')
Add Student
@endsection
@extends('backend.layouts.master')
@section('style')

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Student</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('designation.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="student_name"><strong>Student Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="student_name" class="form-control" id="student_name" placeholder="Enter Student Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fname"><strong>Father's Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Father's Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="mname"><strong>Mother's Name</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mname" class="form-control" id="mname" placeholder="Enter Mother's Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="mobile"><strong>Mobile</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="address"><strong>Address</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="mname"><strong>Gender</strong> <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" checked="">
                                    <label class="form-check-label" for="gender">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" checked="">
                                    <label class="form-check-label" for="gender">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Others" checked="">
                                    <label class="form-check-label" for="gender">
                                        Others
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="religion"><strong>Religion</strong> <span class="text-danger">*</span></label>
                                <select name="religion" id="religion" class="form-control">
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddhist">Buddhist</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dob"><strong>Date of Birth</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter Father's Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="discount"><strong>Discount</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter Discount">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="year"><strong>Year</strong> <span class="text-danger">*</span></label>
                                <select name="year" class="form-control" id="year">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="class"><strong>Class</strong> <span class="text-danger">*</span></label>
                                <select name="class" class="form-control" id="class">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="group"><strong>Group</strong> <span class="text-danger">*</span></label>
                                <select name="group" class="form-control" id="group">
                                    <option value="">Select</option>
                                </select>
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
@endsection