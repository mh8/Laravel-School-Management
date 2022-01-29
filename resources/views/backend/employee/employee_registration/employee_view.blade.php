@section('title')
Employee List
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
                    <h5 class="card-title">Employee List</h5>
                    <a href="{{ route('employee.registration.create') }}" class="btn btn-primary" style="float: right;">Add Employee</a>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">ID No</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Mobile</th>
                                    <th width="8%">Gender</th>
                                    <th width="8%">Join Date</th>
                                    <th width="8%">Salary</th>
                                    @if (Auth::user()->usertype == 'Admin')
                                    <th width="5%">Code</th>
                                    @endif
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($employeeData as $key => $employee)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->id_no }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->mobile }}</td>
                                    <td>{{ $employee->gender }}</td>
                                    <td>{{ $employee->joindate }}</td>
                                    <td>{{ $employee->salary }}</td>
                                    @if (Auth::user()->usertype == 'Admin')
                                    <td>{{ $employee->code }}</td>
                                    @endif

                                    <td style="white-space: nowrap;">

                                        <a href="{{ route('employee.registration.edit', $employee->id ) }}" style="float: none; margin: 1px;" class="tabledit-edit-button btn btn-info"><span class="ti-pencil"></span></a>

                                        <a target="_blank" title="Details" href="{{ route('employee.registration.details', $employee->id) }}" style="float: none;" class="btn btn-info"><i class="feather icon-eye"></i></a>

                                        <a href="" class="tabledit-delete-button btn btn-danger" style="margin: 1px; float: none;" id="delete"><span class="ti-trash"></span></a>
                                    </td>
                                </tr>
                                @endforeach
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
