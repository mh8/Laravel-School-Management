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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                                <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a>
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
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="DocumentResults">
                        <script id="document-template" type="text/x-handlebars-template">
                            <div class="table-responsive">
                                <table class="table table-dark table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            @{{thsource}}
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @{{#each this}}
                                        <tr>
                                            @{{tdsource}}
                                        </tr>
                                        @{{/each}}
                                    </tbody>
                                </table>
                            </div>
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
<script>
    $(document).on('click','#search',function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();

        $.ajax({
            url:"{{ route('registration.fee.classise') }}",
            type:'get',
            data:{'year_id':year_id, 'class_id':class_id},
            beforeSend: function(){
            },
            success: function(data){
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle = "tooltip"]').tooltip();
            }
        });
    });
</script>
@endsection
@section('script')
<!-- Datatable js -->

<!-- Tabledit js -->


@endsection