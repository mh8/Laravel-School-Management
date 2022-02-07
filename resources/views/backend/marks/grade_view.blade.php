@section('title')
Grade Marks
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
                    <h5 class="card-title">Grade Marks</h5>
                    <a href="{{ route('marks.grade.create') }}" class="btn btn-primary" style="float: right;">Add Grade Mark</a>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover table-dark table-bordered" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Letter Grade</th>
                                    <th width="10%">Grade Point</th>
                                    <th width="10%">Start Marks</th>
                                    <th width="10%">End Marks</th>
                                    <th width="10%">Point Range</th>
                                    <th width="10%">Remarks</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($marks_grade as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value->grade_name }}</td>
                                    <td>{{ number_format((float)$value->grade_point,2) }}</td>
                                    <td>{{ $value->start_marks }}</td>
                                    <td>{{ $value->end_marks }}</td>
                                    <td>{{ $value->start_point }} - {{ $value->end_point }}</td>
                                    <td>{{ $value->remarks }}</td>
                                    <td style="white-space: nowrap;">
                                        <a href="{{ route('marks.grade.edit', $value->id ) }}" style="float: none; margin: 1px;" class="btn btn-info"><span class="ti-pencil"></span></a>

                                        <a href="" class="btn btn-danger" style="float: none;" id="delete"><span class="ti-trash"></span></a>
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
