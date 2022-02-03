@section('title')
Employee Attendance
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('backend/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    .badge-pill{
        padding-right: 1em !important;
        padding-left: 1em !important;
        font-weight: 600 !important;
    }
</style>
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
                    <h5 class="card-title">Employee Attendance Details</h5>
                    <a href="{{ route('employee.attendance.create') }}" class="btn btn-primary" style="float: right;">Add Attendance</a>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Name</th>
                                    <th>ID No</th>
                                    <th>Date</th>
                                    <th>Attendance Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($details as $key => $detail)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $detail['user']['name'] }}</td>
                                    <td>{{ $detail['user']['id_no'] }}</td>
                                    <td>{{ date('d-m-y', strtotime($detail->date)) }}</td>
                                    <td><strong class="badge badge-pill
                                    @if ($detail->attendance_status == 'Present') badge-success
                                    @elseif ($detail->attendance_status == 'Absent') badge-danger
                                    @elseif ($detail->attendance_status == 'Leave') badge-info
                                    @endif
                                    " style="font-size: 12px;">{{ $detail->attendance_status }}</strong></td>

                                    <td style="white-space: nowrap; width: 15%;">
                                        <a href="{{ route('employee.attendance.edit', $detail->date ) }}" style="float: none; margin: 5px;" class="tabledit-edit-button btn btn-sm btn-info"><span class="ti-pencil"></span></a>

                                        <a href="{{ route('employee.leave.delete', $detail->date) }}" class="tabledit-delete-button btn btn-sm btn-danger" style="margin: 5px; float: none;" id="delete"><span class="ti-trash"></span></a>
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
