@section('title')
Add Fee Amount
@endsection
@extends('backend.layouts.master')
@section('style')

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Fee Amount</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <form class="form-validate" action="" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="fee_category_id">Fee Category <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="fee_category_id" name="fee_category_id">
                                    <option value="">Select Fee Category</option>
                                    @foreach($fee_categories as $fee_category)
                                    <option value="{{ $fee_category->id }}">{{ $fee_category->name }}</option>
                                    @endforeach
                                </select>
                                @error('fee_category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="amount">Fee Amount <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="amount" name="amount[]" placeholder="Enter Fee Amount">

                            </div>
                            <span class="p-1"><i class="fa fa-plus"></i></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="fee_amount">Class <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="class_id" name="class_id">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"></label>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
@endsection
