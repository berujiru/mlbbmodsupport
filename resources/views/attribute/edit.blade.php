@extends('layouts.master')
@section('title') @lang('Attributes')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Attributes @endslot
@slot('title') Edit  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Edit Attribute</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('attribute.index') }}"> <i class="bx bx-arrow-back"></i></a>
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

{!! Form::model($attrib, ['route' => ['attribute.update', $attrib->attribute_id],'method' => 'PATCH']) !!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            {!! Form::text('attribute_name', null, array('placeholder' => 'Attribute','class' => 'form-control','autocomplete'=>'off', 'id'=>'attribfloatingInput')) !!}
            <label for="codefloatingInput">Attribute</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i>Update</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection