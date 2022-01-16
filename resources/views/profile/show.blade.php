@extends('admin.admin_master')
@section('admin')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Invoice</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item"><a href="#">Basic</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- End row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-md-12 col-lg-10 col-xl-10">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="profile" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <h3>{{ Auth::user()->name }}</h3>
                                <p>{{ Auth::user()->email }}</p>

                                <div>
                                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                    @livewire('profile.update-profile-information-form')
                                    @endif
                                </div>




                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.update-password-form')
                                </div>

                                <x-jet-section-border />
                                @endif
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
