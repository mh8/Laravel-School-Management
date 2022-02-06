@section('title')
Edit Cost
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
                    <h5 class="card-title">Edit Cost</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('account.other.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="amount"><strong>Amount</strong> <span class="text-danger">*</span></label>
                                <input type="text" name="amount" class="form-control" id="amount" value="{{ $data->amount }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date"><strong>Date</strong> <span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" id="date" value="{{ $data->date }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="remarks"><strong>Description</strong> <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="start_marks"><strong>Image</strong> <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" id="image" onchange="preview()">
                            </div>
                            <div class="form-group col-md-6">
                                <img src="{{ (!empty($data->image))? url('uploads/other_account_cost/'.$data->image) : url('uploads/no_image.jpg') }}" alt="user-img" style="width: 200px;" id="showImage">
                                @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
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