@section('title')
Update User
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
                    <h5 class="card-title">Update User</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Basic form validation.</h6>
                    <form class="form-validate" action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                            </div>
                            @error('name')
                            <span class="invalid-feedback text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email ID" value="{{ $user->email }}">
                            </div>
                            @error('email')
                            <span class="invalid-feedback text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
                                @error('password')
                                <span class="invalid-feedback text-danger">
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
                            @error('password_confirmation')
                            <span class="invalid-feedback text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="role">Role <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <select class="form-control" id="role" name="role">
                                    <option value="">Please select</option>
                                    <option value="Admin" {{ ($user->role == 'Admin' ? 'selected':'') }}>Admin</option>
                                    <option value="Operator" {{ ($user->role == 'Operator' ? 'selected':'') }}>Operator </option>
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
<!-- End Contentbar -->
@endsection
@section('script')
@endsection