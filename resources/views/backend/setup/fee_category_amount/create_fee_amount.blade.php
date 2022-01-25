@section('title')
Add Fee Amount
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                    <form class="form-validate" action="{{ route('fee.amount.store') }}" method="post">
                        @csrf
                        <div class="" id="add_item">
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
                                <label class="col-lg-4 col-form-label" for="fee_amount">Class <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="class_id" name="class_id[]">
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
                                <label class="col-lg-4 col-form-label" for="amount">Fee Amount <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="amount" name="amount[]" placeholder="Enter Fee Amount">

                                </div>
                                <span class="btn btn-success addeventmore p-1"><i class="fa fa-plus"></i></span>
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
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="fee_amount">Class <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <select class="form-control" id="class_id" name="class_id[]">
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
                <label class="col-lg-4 col-form-label" for="amount">Fee Amount <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="amount" name="amount[]" placeholder="Enter Fee Amount">

                </div>
                <span class="btn btn-success addeventmore p-1"><i class="fa fa-plus"></i></span>
                <span class="btn btn-danger removeeventmore p-1"><i class="fa fa-close"></i></span>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var count = 0;
        $(document).on("click", ".addeventmore", function() {
            count++;
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $("#add_item").append(whole_extra_item_add);
            // var whole_extra_item_add = $("#whole_extra_item_add").html();
            // $(this).closest(".add_item").append(whole_extra_item_add);
            // count++;
        });
        $(document).on("click", ".removeeventmore", function() {
            $(this).closest(".delete_whole_extra_item_add").remove();
            count--;
        });
        // $(document).on("click", ".removeeventmore", function(event) {
        //     $(this).closest(".delete_whole_extra_item_add").remove();
        //     count--;
        // });
    });
</script>
@endsection
@section('script')
@endsection