@section('title')
Student Fee
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

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="year_id">Year</label>
                            <select id="year_id" name="year_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="class_id">Class</label>
                            <select id="class_id" name="class_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fee_category_id">Fee Category</label>
                            <select id="fee_category_id" name="fee_category_id" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach ($fee_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="date"><strong>Date</strong> </label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <a id="search" name="search" class="btn btn-rounded btn-outline-info mt-3 ml-5 p-3">Search</a>
                        </div>
                    </div>

                    <br>
                    <div class="">
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">
                                <form method="post" action="{{ route('account.fee.store') }}">
                                    @csrf
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
                                </form>
                            </script>
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
@endsection
@section('script')
<script>
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var fee_category_id = $('fee_category_id').val();
        var date = $('#date').val();

        $.ajax({
            url: "{{ route('account.fee.getstudents') }}",
            type: 'get',
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'fee_category_id': fee_category_id,
                'date': date,
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
@endsection
