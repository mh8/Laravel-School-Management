@section('title')
Profile View
@endsection
@extends('backend.layouts.master')
@section('style')
@endsection
@section('rightbar-content')
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-hader">
                    <h5 class="card-title">Profile View</h5>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary" style="float: right;">Edit Profile</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="{{ (!empty($user->image))? url('uploads/user_images/'.$user->image) : url('uploads/no_image.jpg') }}" alt="user-img" class="rounded-circle shadow-sm">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="profile-head">
                                <div class="row">
                                    <label class="col-md-3" for="">Name </label>
                                    <h5 class="col-md-4">{{ $user->name }}</h5>
                                </div>
                                <div class="row">
                                    <label class="col-md-3" for="">Role </label>
                                    <h6 class="col-md-4">
                                        @if($user->usertype == 'Admin')
                                        <span class="badge badge-pill badge-primary">{{ $user->usertype }}</span>
                                        @elseif($user->usertype == 'User')
                                        <span class="badge badge-pill badge-success">{{ $user->usertype }}</span>
                                        @endif
                                    </h6>
                                </div>
                                <div class="row">
                                    <label class="col-md-3" for="">Email </label>
                                    <h6 class="col-md-4">{{ $user->email }}</h6>
                                </div>
                                <div class="row">
                                    <label class="col-md-3" for="">Mobile </label>
                                    <h6 class="col-md-4">{{ $user->mobile }}</h6>
                                </div>
                                <div class="row">
                                    <label class="col-md-3" for="">Gender </label>
                                    <h6 class="col-md-4">
                                    {{ $user->gender }}
                                    </h6>
                                </div>
                                    
                                <div class="row">
                                    <label class="col-md-3" for="">Address </label>
                                    <h6 class="col-md-4">{{ $user->address }}</h6>
                                </div>
                                <div class="row">
                                    <label class="col-md-3" for="">Status </label>
                                    <h6 class="col-md-4">
                                        @if($user->status == 'Active')
                                        <span class="badge badge-pill badge-success">Active</span>
                                        @elseif($user->status == 'Inactive')
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                        @endif
                                    </h6>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
@endsection