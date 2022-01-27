@section('title')
Student Monthly Fee List
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

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
                                <label for="month">Class</label>
                                <select id="month" name="month" class="form-control">
                                    <option selected="">Choose...</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="April">May</May>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="">
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        @{{{thsource}}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @{{#each this}}
                                    <tr>
                                    @{{{tdsource}}}
                                    </tr>
                                    @{{/each}}
                                </tbody>
                            </table>
                            </script>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- End col -->
    <!-- Start col -->
    <!-- <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student List</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="DocumentResults">
                        <script id="document-template" type="text/x-handlebars-template">
                            <table class="table table-dark table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @{{#each this}}
                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>
                                        @{{/each}}
                                    </tbody>
                                </table>
                        </script>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
<script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var month = $('#month').val();

        $.ajax({
            url: "{{ route('registration.fee.classwise') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'month': month
            },
            beforeSend: function() {},
            success: function(data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
<script>

</script>
@endsection
