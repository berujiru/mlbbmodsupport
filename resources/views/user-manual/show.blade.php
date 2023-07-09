@extends('layouts.master')
@section('title') @lang('Users Manual')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Manual @endslot
@slot('title') View  @endslot
@endcomponent
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Test</title>
</head>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('user-manual.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xl-12">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Manual</h5>
                </div>
                <div class="card-body pt-2">
                    <div id="pspdfkit" style="height: 100vh"></div>
                    <!-- <a href="{{ URL::asset('/assets/viewerjs/#../manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf') }}">aaa</a> -->
                    <!-- <a href="http://example.org/ViewerJS/#../path/to/filename.ext"> -->
                    <!-- <iframe src = "/assets/viewerjs/#../manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe> -->
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
        <!-- end stickey -->

    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('/assets/pspdfkit/pspdfkit.js') }}"></script>
<script src="{{ URL::asset('/assets/viewerjs/pdf.js') }}"></script>
<script>
	PSPDFKit.load({
		container: "#pspdfkit",
  		document: "{{ URL::asset('/manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf') }}" // Add the path to your document here.
	})
	.then(function(instance) {
		console.log("PSPDFKit loaded", instance);
	})
	.catch(function(error) {
		console.error(error.message);
	});
</script>
@endsection
