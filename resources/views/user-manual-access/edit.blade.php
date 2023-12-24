@extends('layouts.master')
@section('title') @lang('User Manual Access')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') User Manual Access @endslot
@slot('title') Edit  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Edit User Manual Access</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('user-manual-access.index') }}"> <i class="bx bx-arrow-back"></i></a>
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

{!! Form::model($data, ['route' => ['user-manual-access.update', $data->user_manual_access_id],'method' => 'PATCH']) !!}
    <div class="row g-3">
        <div class="col-xxl-12">
            <div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User Type </label>
                        <select class="form-control" name="user_type" id="user_type" required>
                            <option value="">Select User Type ...</option>
                            @foreach($user_types as $ut)
                                <option value="{{$ut->user_type_id}}" <?= $ut->user_type_id == $data->user_type_id ? 'selected' : '' ?>>{{ $ut->user_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xxl-12">
            <div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="user_manual" class="form-label">User Manual </label>
                        <select class="form-control" name="user_manual" id="user_manual"  data-choices data-choices-removeitem required>
                            <option value="">Select User Manual ...</option>
                            @foreach($user_manuals as $um)
                                <option value="{{$um->user_manual_id}}" <?= $um->user_manual_id == $data->user_manual_id ? 'selected' : '' ?>>{{ $um->manual_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
            <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i>Update</button>
        </div>
        </div><!--end col-->
    </div><!--end row-->
{!! Form::close() !!}

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection