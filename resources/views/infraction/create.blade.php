@extends('layouts.master')
@section('title') @lang('Infractions')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Infractions @endslot
@slot('title') Add  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Infraction</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('infraction.index') }}"> <i class="bx bx-arrow-back"></i></a>
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

{!! Form::open(array('route' => 'infraction.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            {!! Form::text('code', null, array('placeholder' => 'Infraction Code','class' => 'form-control','autocomplete'=>'off', 'id'=>'codefloatingInput')) !!}
            <label for="codefloatingInput">Infraction Code</label>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-floating">
            {!! Form::text('detail', null, array('placeholder' => 'Infraction Detail','class' => 'form-control','autocomplete'=>'off','id'=>'detailfloatingInput')) !!}
            <label for="detailfloatingInput">Infraction Detail</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i>Save</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
