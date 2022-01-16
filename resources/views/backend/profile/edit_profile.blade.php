@section('title')
Edit Profile
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
                    <h5 class="card-title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form class="" action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="usertype">Role <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="usertype" name="usertype">
                                    <option value="">Please select</option>
                                    <option value="Admin" {{ ($user->usertype == 'Admin' ? 'selected':'') }}>Admin</option>
                                    <option value="User" {{ ($user->usertype == 'User' ? 'selected':'') }}>User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="confirm-password">Re-Type Password <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="" name="password_confirmation" placeholder="Enter again passward for confirm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="mobile">Gender <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" {{ ($user->gender == 'Male' ? 'checked': '') }}>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Female" {{ ($user->gender == 'Female' ? 'checked': '') }}>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Hidden">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Hidden
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="address">Address <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <textarea class="form-control" id="address" name="address" placeholder="Enter Address">{{ $user->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="image">Profile Picture <span class="text-danger"></span></label>
                            <div class="col-lg-6">
                                <input type="file" name="image" class="form-control-file" id="image" onchange="preview()">
                            </div> 
                        </div>
                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label"></label>
                            <div class="col-lg-6">
                                
                                <img id="showImage" src="{{ (!empty($user->image))? url('uploads/user_images/'.$user->image) : url('uploads/no_image.jpg') }}" alt="user-img" style="width: 100px; height:100px">
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="city">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="status" name="status">
                                    <option value="">Please select</option>
                                    <option value="Active" {{ ($user->status == 'Active' ? 'selected':'') }}>Active</option>
                                    <option value="Inactive" {{ ($user->status == 'Inactive' ? 'selected':'') }}>Inactive</option>
                                </select>
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
<script>
    function preview() {
    showImage.src=URL.createObjectURL(event.target.files[0]);
}
</script>
<!-- End Contentbar -->
@endsection
@section('script')
@endsection