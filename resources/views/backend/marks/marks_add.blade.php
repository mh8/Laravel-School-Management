@section('title')
Student Marks Entry
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
                    <form method="post" action="{{ route('marks.entry.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="year_id">Year</label>
                                <select id="year_id" name="year_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="class_id">Class</label>
                                <select id="class_id" name="class_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{(@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="assign_subject_id">Subject</label>
                                <select id="assign_subject_id" name="assign_subject_id" class="form-control">
                                    <option selected="">Choose...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exam_type_id">Exam</label>
                                <select id="exam_type_id" name="exam_type_id" class="form-control">
                                    <option selected="">Choose...</option>
                                    @foreach ($exam_types as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a>
                            </div>
                        </div>

                        <br>
                        <div class="d-none" id="marks-entry">
                            <div>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID No</th>
                                            <th>Student Name</th>
                                            <th>Father Name</th>
                                            <th>Gender</th>
                                            <th>Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="marks-entry-tbody">

                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();

        $.ajax({
            url: "{{ route('marks.get.students') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
            },
            success: function(data) {
                $('#marks-entry').removeClass('d-none');
                var html = '';
                $.each(data, function(key, value) {
                    html +=
                        '<tr>' +
                        '<td>' + value.student.id_no + '<input type="hidden" name="student_id[]" value="' + value.student_id + '"/>' + '<input type="hidden" name="id_no[]" value="' + value.student.id_no + '"/>' + '</td>' +
                        '<td>' + value.student.name + '</td>' +
                        '<td>' + value.student.fname + '</td>' +
                        '<td>' + value.student.gender + '</td>' +
                        '<td>' + '<input type="text" class="form-control" name="marks[]"/>' + '</td>' +
                        '</tr>';
                });
                html = $('#marks-entry-tbody').html(html);
            }
        });
    });
</script>
<script>
    $(document).on('change', '#class_id', function() {
        var class_id = $('#class_id').val();
        $.ajax({
            url: "{{ route('marks.get.subjects') }}",
            type: 'get',
            data: {
                'class_id': class_id,
            },
            beforeSend: function() {},
            success: function(data) {
                var html = ' <option value=""></option>';
                $.each(data, function(key, value) {
                    html += '<option value="' + value.id + '">' + value.subject.name + '</option>';
                });
                $('#assign_subject_id').html(html);
            }
        });
    });
</script>
@endsection