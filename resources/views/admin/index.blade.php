@section('title')
School
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Apex css -->
<link href="{{ asset('backend/assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('backend/assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-3">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-user"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Students</h5>
                                    <h4 class="mb-0">{{ $students }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated Today</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>25%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-award"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Teachers</h5>
                                    <h4 class="mb-0">{{ $teachers }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 1 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"><i class="feather icon-trending-down mr-1"></i>23%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-warning-inverse mr-0"><i class="feather icon-briefcase"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Staffs</h5>
                                    <h4 class="mb-0">45</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 3 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-success"><i class="feather icon-trending-up mr-1"></i>15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-secondary-inverse mr-0"><i class="feather icon-book-open"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Course</h5>
                                    <h4 class="mb-0">93</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <span class="font-13">Updated 5 Day ago</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="badge badge-warning"><i class="feather icon-trending-down mr-1"></i>10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-9">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Student Performance</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetStudent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetStudent">
                                            <a class="dropdown-item font-13" href="#">Refresh</a>
                                            <a class="dropdown-item font-13" href="#">Export</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-0 pl-0 pr-2">
                            <div id="apex-area-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30 quote-bg">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <span class=""><i class="mdi mdi-format-quote-open text-black font-20"></i></span>
                                </div>
                                <div class="col-10">
                                    <h5 class="card-title mb-0 text-right">Quote of the Day</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('backend/assets/images/general/school_quote.svg') }}" class="img-fluid my-3" width="150" alt="school quote">
                            <h5 class="text-primary font-italic my-3">Be the change, You wish<br /> to see in the World.</h5>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Course</h5>
                        </div>
                        <div class="card-body text-center">
                            <div class="course-slider">
                                <div class="course-slider-item">
                                    <h4 class="my-0">Commerce</h4>
                                    <div class="row align-items-center my-4 py-3">
                                        <div class="col-4 p-0">
                                            <h4>24</h4>
                                            <p class="mb-0">Faculty</p>
                                        </div>
                                        <div class="col-4 py-3 px-0 bg-primary-rgba rounded">
                                            <h4 class="text-primary">{{ $commerce }}</h4>
                                            <p class="text-primary mb-0">Students</p>
                                        </div>
                                        <div class="col-4 p-0">
                                            <h4>09</h4>
                                            <p class="mb-0">Class</p>
                                        </div>
                                    </div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 text-left">
                                            <span class="font-13">80% Completed</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="font-13">19/25 Module</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-slider-item">
                                    <h4 class="my-0">Science</h4>
                                    <div class="row align-items-center my-4 py-3">
                                        <div class="col-4 p-0">
                                            <h4>22</h4>
                                            <p class="mb-0">Faculty</p>
                                        </div>
                                        <div class="col-4 py-3 px-0 bg-success-rgba rounded">
                                            <h4 class="text-success">{{ $science }}</h4>
                                            <p class="text-success mb-0">Students</p>
                                        </div>
                                        <div class="col-4 p-0">
                                            <h4>05</h4>
                                            <p class="mb-0">Class</p>
                                        </div>
                                    </div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 text-left">
                                            <span class="font-13">70% Completed</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="font-13">17/25 Module</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-slider-item">
                                    <h4 class="my-0">Arts</h4>
                                    <div class="row align-items-center my-4 py-3">
                                        <div class="col-4 p-0">
                                            <h4>18</h4>
                                            <p class="mb-0">Faculty</p>
                                        </div>
                                        <div class="col-4 py-3 px-0 bg-secondary-rgba rounded">
                                            <h4 class="text-secondary">{{ $arts }}</h4>
                                            <p class="text-secondary mb-0">Students</p>
                                        </div>
                                        <div class="col-4 p-0">
                                            <h4>15</h4>
                                            <p class="mb-0">Class</p>
                                        </div>
                                    </div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 text-left">
                                            <span class="font-13">60% Completed</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="font-13">15/25 Module</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Parents Feedback</h5>
                        </div>
                        <div class="card-body">
                            <div class="parents-slider">
                                <div class="parents-slider-item">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-4">
                                            <img src="{{ asset('backend/assets/images/general/parent_01.png') }}" class="img-fluid" alt="parent">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            <h5 class="card-title mb-1">Ms. Jessica Matthew</h5>
                                            <p class="mb-0 font-14 font-italic">Mother of Larry Matthew, Class 6</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="parents-slider-item">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-4">
                                            <img src="{{ asset('backend/assets/images/general/parent_02.png') }}" class="img-fluid" alt="parent">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            <h5 class="card-title mb-1">Ms. John Doe</h5>
                                            <p class="mb-0 font-14 font-italic">Father of Mila Doe, Class 5</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="parents-slider-item">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-4">
                                            <img src="{{ asset('backend/assets/images/general/parent_03.png') }}" class="img-fluid" alt="parent">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            <h5 class="card-title mb-1">Ms. Maria Andrew</h5>
                                            <p class="mb-0 font-14 font-italic">Mother of Will Andrew, Class 1</p>
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
        <!-- End col -->
    </div>
    <!-- End row -->
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-9">
                            <h5 class="card-title mb-0">Top Students</h5>
                        </div>
                        <div class="col-6 col-lg-3">
                            <select class="form-control font-12">
                                <option value="class1">Class 1</option>
                                <option value="class2">Class 2</option>
                                <option value="class3">Class 3</option>
                                <option value="class4">Class 4</option>
                                <option value="class5" selected>Class 5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Std</th>
                                    <th>Maths</th>
                                    <th>Science</th>
                                    <th>English</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>5</td>
                                    <td>99</td>
                                    <td>99</td>
                                    <td>99</td>
                                    <td>99%</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jimmy Simpson</td>
                                    <td>5</td>
                                    <td>98</td>
                                    <td>98</td>
                                    <td>98</td>
                                    <td>98%</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Lorea Johnson</td>
                                    <td>5</td>
                                    <td>97</td>
                                    <td>97</td>
                                    <td>97</td>
                                    <td>97%</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Merry Aniston</td>
                                    <td>5</td>
                                    <td>96</td>
                                    <td>96</td>
                                    <td>96</td>
                                    <td>96%</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Jessica Perry</td>
                                    <td>5</td>
                                    <td>95</td>
                                    <td>95</td>
                                    <td>95</td>
                                    <td>95%</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Maria Salkova</td>
                                    <td>5</td>
                                    <td>94</td>
                                    <td>94</td>
                                    <td>94</td>
                                    <td>94%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h5 class="card-title mb-0">Head of Department</h5>
                        </div>
                        <div class="col-3">
                            <div class="dropdown">
                                <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetHod" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetHod">
                                    <a class="dropdown-item font-13" href="#">Refresh</a>
                                    <a class="dropdown-item font-13" href="#">Export</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Pic</th>
                                    <th>Name</th>
                                    <th>Degree</th>
                                    <th>Experience</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('backend/assets/images/users/men.svg') }}" class="img-fluid" width="40" alt="hod"></td>
                                    <td>Mr. Rony Samson</td>
                                    <td>B.Com (Maths)</td>
                                    <td>10+ Years</td>
                                    <td><span class="badge badge-primary-inverse py-2 px-3 font-12">MATHEMATICS</span></td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('backend/assets/images/users/women.svg') }}" class="img-fluid" width="40" alt="hod"></td>
                                    <td>Mr. Andrew Garfield</td>
                                    <td>B.Sc (Chemistry)</td>
                                    <td>8+ Years</td>
                                    <td><span class="badge badge-success-inverse py-2 px-3 font-12">SCIENCE</span></td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('backend/assets/images/users/boy.svg') }}" class="img-fluid" width="40" alt="hod"></td>
                                    <td>Mr. Naomi Wattson</td>
                                    <td>B.Ed (English)</td>
                                    <td>5+ Years</td>
                                    <td><span class="badge badge-warning-inverse py-2 px-3 font-12">ENGLISH</span></td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('backend/assets/images/users/girl.svg') }}" class="img-fluid" width="40" alt="hod"></td>
                                    <td>Mr. Mark Wahlberg</td>
                                    <td>B.A (Sports)</td>
                                    <td>3+ Years</td>
                                    <td><span class="badge badge-secondary-inverse py-2 px-3 font-12">SPORTS</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
<!-- Apex js -->
<script src="{{ asset('backend/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('backend/assets/plugins/slick/slick.min.js') }}"></script>
<!-- Custom Dashboard js -->
<script src="{{ asset('backend/assets/js/custom/custom-dashboard-school.js') }}"></script>
@endsection
