@extends('layouts.master')
@section('title') @lang('Team Deputy')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Team Deputy @endslot
@slot('title') Update  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Update Team Deputy for <em>{{ !empty($deputy->team) ? $deputy->team->team_name : 'Team not found'}}</em></h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="{{ route('team-deputy.index') }}"> <i class="bx bx-arrow-back"></i></a>
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

{!! Form::model($deputy, ['route' => ['team-deputy.update', $deputy->deputy_team_id],'method' => 'PATCH']) !!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            <input placeholder="Team Name" class="form-control" autocomplete="off" disabled="disabled" id="teamSelect" type="text" value="{{ !empty($deputy->team) ? $deputy->team->team_name : 'Team not found' }}">
            <label for="teamSelect">Team</label>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-floating">
            <select class="form-select" id="profileSelect" name="profile_id">
                <option value="">Choose ...</option>
                @foreach($list_profiles as $pr)
                    <option value="{{$pr->id}}">{{ $pr->firstname.' '.$pr->lastname }}</option>
                @endforeach
            </select>
            <label for="profileSelect">Select Profile</label>
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