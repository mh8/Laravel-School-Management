@section('title')
Student List
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Search</h5>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('student.year.class.wise') }}">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="year_id">Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{(@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student List</h5>
                    <a href="{{ route('student.registration.create') }}" class="btn btn-primary" style="float: right;">Add Student</a>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        @if(!@search)
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Student Name</th>
                                    <th>ID No</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>Shift</th>
                                    <th>Year</th>
                                    <th>Image</th>
                                    @if(Auth::user()->role == 'Admin')
                                    <th>Code</th>
                                    @endif
                                    <th width="8%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($students as $key => $value)
                                <tr style="background-color: white;">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value['student']['name'] }}</td>
                                    <td>{{ $value['student']['id_no'] }}</td>
                                    <td>{{ $value['student']['roll'] }}</td>
                                    <td>{{ $value['student_class']['name'] }}</td>
                                    <td>{{ $value['student_shift']['shift_name'] }}</td>
                                    <td>{{ $value['student_year']['year'] }}</td>
                                    <td>
                                        <img src="{{ (!empty($value['student']['image']))? url('uploads/student_images/'.$value['student']['image']) : url('uploads/no_image.jpg') }}" alt="user-img" style="width: 50px;" id="showImage">
                                    </td>
                                    <td></td>
                                    <td style="white-space: nowrap;">
                                        <a href="{{ route('student.registration.edit', $value->student_id) }}" style="float: none; margin: 1px;" class="tabledit-edit-button btn btn-sm btn-info"><span class="ti-pencil"></span></a>
                                        <a href="" style="float: none; margin: 1px;" class="tabledit-delete-button btn btn-sm btn-dark"><span></span><i class="dripicons-document"></i></a>
                                        <a href="" class="tabledit-delete-button btn btn-sm btn-danger" style="margin: 1px; float: none;" id="delete"><span class="ti-trash"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Student Name</th>
                                    <th>ID No</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>Shift</th>
                                    <th>Year</th>
                                    <th>Image</th>
                                    @if(Auth::user()->role == 'Admin')
                                    <th>Code</th>
                                    @endif
                                    <th width="8%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($students as $key => $value)
                                <tr style="background-color: white;">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value['student']['name'] }}</td>
                                    <td>{{ $value['student']['id_no'] }}</td>
                                    <td>{{ $value['student']['roll'] }}</td>
                                    <td>{{ $value['student_class']['name'] }}</td>
                                    <td>{{ $value['student_shift']['shift_name'] }}</td>
                                    <td>{{ $value['student_year']['year'] }}</td>
                                    <td>
                                        <img src="{{ (!empty($value['student']['image']))? url('uploads/student_images/'.$value['student']['image']) : url('uploads/no_image.jpg') }}" alt="user-img" style="width: 50px;" id="showImage">
                                    </td>
                                    <td></td>
                                    <td style="white-space: nowrap;">
                                        <a href="{{ route('student.registration.edit', $value->student_id) }}" style="float: none; margin: 1px;" class="tabledit-edit-button btn btn-sm btn-info"><span class="ti-pencil"></span></a>
                                        <a href="" style="float: none; margin: 1px;" class="tabledit-delete-button btn btn-sm btn-dark"><span></span><i class="dripicons-document"></i></a>
                                        <a href="" class="tabledit-delete-button btn btn-sm btn-danger" style="margin: 1px; float: none;" id="delete"><span class="ti-trash"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
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
<!-- Datatable js -->
<script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/custom-table-datatable.js') }}"></script>
<!-- Tabledit js -->
<script src="{{ asset('backend/assets/plugins/tabledit/jquery.tabledit.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/custom-table-editable.js') }}"></script>
@endsection