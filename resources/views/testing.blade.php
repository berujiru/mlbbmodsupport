@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') outer @endslot
@slot('title') inner  @endslot
@endcomponent
<h1>we are here!</h1>


<pre>
 {{var_dump($data)}}   
</pre>


@endsection

@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
