@section('title')
Salary Increment
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
                    <h5 class="card-title">Salary Increment</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee.salary.increment.store', $allData->id) }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 form-group">
                                <label for="increment_salary">Salary Amount <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="increment_salary" name="increment_salary" placeholder="Enter Salary Amount">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="effected_date">Effected date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="effected_date" name="effected_date">
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
