@extends('layouts.master')
@section('title') @lang('Team Deputy')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Team Deputy @endslot
@slot('title') Assign  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Assign Team Deputy</h2>
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

{!! Form::open(array('route' => 'team-deputy.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            <!-- {{ Form::select('team_id',[''=>'Select team ...',\App\Models\Team::all()->pluck('team_name', 'team_id')->toArray()], null,['class'=>'form-select','id'=>'teamSelect']) }} -->
            <select class="form-select" id="teamSelect" name="team_id">
                <option value="">Choose ...</option>
                @foreach($list_teams as $team)
                    <option value="{{$team->team_id}}">{{ $team->team_name }}</option>
                @endforeach
            </select>
            <label for="teamSelect">Select Team</label>
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
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i>Save</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
