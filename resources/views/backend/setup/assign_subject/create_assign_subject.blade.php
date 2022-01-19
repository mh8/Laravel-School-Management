@section('title')
Add Assign Subject
@endsection
@extends('backend.layouts.master')
@section('style')

@endsection
@section('rightbar-content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Assign Subject</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('assign.subject.store') }}" method="POST">
                        @csrf
                        <div class="add_item" id="add_item">
                            <div class="form-group">
                                <label for="class_id">Class <span class="text-danger">*</span></label>
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
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="subject_id">Subject <span class="text-danger">*</span></label>
                                    <select class="form-control" id="subject_id" name="subject_id[]">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="full_mark">Full Mark <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="full_mark" name="full_mark[]" placeholder="Enter Full Mark">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pas_mark">Pass Mark <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pass_mark" name="pass_mark[]" placeholder="Enter Pass Mark">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="subjective_mark">Subjective Mark <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subjective_mark" name="subjective_mark[]" placeholder="Enter Subjective Mark">
                                </div>
                                <div class="form-group col-md-2">
                                    <span class="btn btn-success addeventmore p-1"><i class="fa fa-plus"></i></span>
                                </div>
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
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="subject_id">Subject <span class="text-danger">*</span></label>
                    <select class="form-control" id="subject_id" name="subject_id[]">
                        <option value="">Select Subject</option>
                        @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="full_mark">Full Mark <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="full_mark" name="full_mark[]" placeholder="Enter Full Mark">
                </div>
                <div class="form-group col-md-2">
                    <label for="pas_mark">Pass Mark <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="pass_mark" name="pass_mark[]" placeholder="Enter Pass Mark">
                </div>
                <div class="form-group col-md-2">
                    <label for="subjective_mark">Subjective Mark <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="subjective_mark" name="subjective_mark[]" placeholder="Enter Subjective Mark">
                </div>
                <div class="form-group col-md-2">
                    <span class="btn btn-success addeventmore p-1"><i class="fa fa-plus"></i></span>
                    <span class="btn btn-danger removeeventmore p-1"><i class="fa fa-close"></i></span>
                </div>
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
