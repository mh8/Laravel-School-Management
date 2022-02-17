@section('title')
Student Result Report
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <form method="GET" action="">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="year_id">Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected disabled>Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected disabled>Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{(@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a>
                                <!-- <button type="submit" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</button> -->
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="">
                        <div id="DocumentResults">

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
<!-- End Contentbar -->
<script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();

        $.ajax({
            url: "{{ route('report.idcard.getstudents') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
            },
            beforeSend: function() {},
            success: function(data) {
                var source = $("#document-template").html();
                var sl = 1;
                var html = '<table class="table table-bordered table-striped" id="document-table">' +
                    '<thead>' +
                    '<tr>' +
                    '<th>Sl</th>' +
                    '<th>ID No</th>' +
                    '<th>Name</th>' +
                    '<th>Class</th>' +
                    '<th>Roll</th>' +
                    '<th>Action</th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                if (data != '') {
                    $.each(data, function(key, value) {
                        var id = value.student.id;
                        html += '<tr>' +
                            '<td>' + sl++ + '</td>' +
                            '<td>' + value.student.id_no + '</td>' +
                            '<td>' + value.student.name + '</td>' +
                            '<td>' + value.student_class.name + '</td>' +
                            '<td>' + value.roll + '</td>' +
                            '<td>' +
                            '<a href="/report/idcard/pdf/'+id+'" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3" target="_blank">Print</a>' +
                            '</td>' +
                            // '<td><a href="{{ route("report.idcard.pdf",'+ value.student.id_no +') }}" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">ID Card</a></td>' +
                            //&year_id=' + year_id + '&class_id=' + class_id + '
                            '</tr>';
                    });
                    html += '</tbody>' +
                        '</table>';
                    $('#DocumentResults').html(html);
                }else{
                    html += '<tr>' +
                        '<td colspan="6">No Data Found</td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>';
                    $('#DocumentResults').html(html);
                }
            }
        });
    });
</script>
<script>

</script>
@endsection
