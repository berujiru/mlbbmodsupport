@extends('layouts.master')
@section('title') @lang('Birthday Card')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Birthday Card @endslot
@slot('title') Update  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Birthday Card</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('birthday-card.index') }}"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

{!! Form::model($bdpic, ['route' => ['birthday-card.update', $bdpic->id],'method' => 'PATCH','enctype'=>'multipart/form-data','class'=>'needs-validation']) !!}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Birthday Profile</h4>
            </div>
            <div class="card-body">
                <!-- <div class="form-floating"> -->
                    <select class="form-select" id="profileSelect" name="mod_id" required>
                        <option value="">Select Profile ...</option>
                        @foreach($list_mods as $pr)
                            <option value="{{$pr->modid}}" <?= $bdpic->mod_id == $pr->modid ? 'selected' : '' ?>>{{ $pr->firstname.' '.$pr->lastname }}</option>
                        @endforeach
                    </select>
                    <!-- <label for="profileSelect">Select Profile</label> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Upload Birthday Picture</h4>
            </div>
            <div class="card-body">
            <input type="file" class="form-control @error('pic_filename') is-invalid @enderror" name="pic_filename" id="input-pic_filename" required>
            @error('pic_filename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
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