@section('title')
Employee Salary Details
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
                    <h3 class="card-title mb-1 font-weight-bold">Employee Salary Details</h3>
                    <h6><strong>Employee Name: </strong> {{ $details->name }}</h6>
                    <h6><strong>Employee ID No: </strong> {{ $details->id_no }}</h6>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th >Previous Salary</th>
                                    <th >Increment Salary</th>
                                    <th >Present Salary</th>
                                    <th >Effected Date</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($salary_log as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->previous_salary }}</td>
                                    <td>{{ $value->increment_salary }}</td>
                                    <td>{{ $value->present_salary }}</td>
                                    <td>{{ $value->effected_salary }}</td>
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
