@extends('layouts.master')
@section('title') @lang('Users Manual')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Users Manual @endslot
@slot('title') Upload  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Upload Users Manual</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('user-manual.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <!-- <li>{{ $error }}</li> -->
       @endforeach
    </ul>
  </div>
@endif

{!! Form::open(array('route' => 'user-manual.store','method'=>'POST','enctype'=>'multipart/form-data','class'=>'needs-validation')) !!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Manual Name</h4>
            </div>
            <div class="card-body">
                <!-- <div class="form-floating"> -->
                <input type="text" class="form-control @error('manual_name') is-invalid @enderror" placeholder="Input Manual Name..." name="manual_name" id="input-manual_name" required>
                    <!-- <label for="profileSelect">Select Profile</label> -->
                <!-- </div> -->
                @error('manual_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ 'Requires valid input!' }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Manual Description</h4>
            </div>
            <div class="card-body">
                <!-- <div class="form-floating"> -->
                <input type="text" class="form-control @error('manual_description') is-invalid @enderror" placeholder="Input Manual Description..." name="manual_description" id="input-manual_description" required>
                    <!-- <label for="profileSelect">Select Profile</label> -->
                <!-- </div> -->
                @error('manual_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ 'Requires valid input!' }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Upload File</h4>
            </div>
            <div class="card-body">
            <input type="file" class="form-control @error('file_name') is-invalid @enderror" name="file_name" id="input-filename" required>
            @error('file_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ 'Only PDF file is allowed!' }}</strong>
                </span>
            @enderror
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-upload"></i> Upload</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
