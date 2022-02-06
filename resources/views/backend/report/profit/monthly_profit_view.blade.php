@section('title')
Monthly / Yearly Profit
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
                    <h5 class="card-title">Employee Search</h5>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('student.year.class.wise') }}">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="start_date"><strong>Start Date</strong> </label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="end_date"><strong>End Date</strong> </label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
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
                                    <tr>
                                    @{{{tdsource}}}
                                    </tr>
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
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
<script>
    $(document).on('click', '#search', function() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        $.ajax({
            url: "{{ route('report.profit.datewise.get') }}",
            type: 'get',
            data: {
                'start_date': start_date,
                'end_date': end_date,
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
