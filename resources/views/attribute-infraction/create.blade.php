@extends('layouts.master')
@section('title') @lang('Attributes-Infraction')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Attributes-Infraction @endslot
@slot('title') Add  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Infraction to Attribute</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('attrib-infra.index') }}"> <i class="bx bx-arrow-back"></i></a>
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

{!! Form::open(array('route' => 'attrib-infra.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            <select class="form-select" id="attribSelect" name="attribute_id">
                <option value="">Choose ...</option>
                @foreach($list_attrib as $attrib)
                    <option value="{{$attrib->attribute_id}}">{{ $attrib->attribute_name }}</option>
                @endforeach
            </select>
            <label for="attribSelect">Select Attribute</label>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-floating">
            <select class="form-select" id="infraSelect" name="infraction_id">
                <option value="">Choose ...</option>
                @foreach($list_infra as $infra)
                    <option value="{{$infra->id}}">{{ $infra->code }}</option>
                @endforeach
            </select>
            <label for="infraSelect">Select Infraction</label>
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
