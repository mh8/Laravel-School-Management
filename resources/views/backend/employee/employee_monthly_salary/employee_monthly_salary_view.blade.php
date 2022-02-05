@section('title')
Employee Monthly Salary List
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
                                <label for="date"><strong>Attendance Date</strong> </label>
                                <input type="date" name="date" id="date" class="form-control">
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
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
<script>
    $(document).on('click', '#search', function() {
        var date = $('#date').val();

        $.ajax({
            url: "{{ route('employee.monthly.salary.get') }}",
            type: 'get',
            data: {
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
<script>

</script>
@endsection
