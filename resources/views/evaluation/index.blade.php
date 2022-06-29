@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Evaluation @endslot
@slot('title') Evaluate  @endslot
@endcomponent

<h2>Mod Infractions</h2>

{!! Form::open(array('route' => 'modevalstore','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="mb-3">
            <label for="bdayinput" class="form-label">Date
            </label>
            {{ Form::date('date',date('Y-m-d'),["class"=>"form-control","data-provider"=>"flatpickr"]) }}  
            @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="mb-3">
            <label for="skillsInput" class="form-label">Moderator</label>
            <select class="form-control" name="mod_id" data-choices
                 id="modInput">
                <option value="" selected disabled hidden>Choose here</option>
                @foreach($mods as $moderator)
                    <option value="{{$moderator->modid}}">{{ $moderator->modid.'- '.$moderator->firstname.' '.$moderator->lastname}}</option>
                @endforeach
            </select>
            @error('mod_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="mb-3">
            <label for="skillsInput" class="form-label">Infraction</label>
            <select class="form-control" name="infractions[]" data-choices multiple id="infractionInput">
                @foreach($infractions as $infraction)
                    <option value="{{$infraction->id}}">{{ $infraction->code.' '.$infraction->detail}}</option>
                @endforeach
            </select>
            @error('infractions')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i> Save</button>
    </div>
    <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Moderator</th>
              <th scope="col">Infraction</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $modinfraction)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td>{{ $modinfraction->date }}</td>
              <td >{{ !empty($modinfraction->profile) ? $modinfraction->profile->firstname." ".$modinfraction->profile->lastname : 'No profile found of '.$modinfraction->mod_id }}</td>
              <td>{{ $modinfraction->infraction_code}}</td>
              <td>
                @if($modinfraction->islock==0)
                <a class="btn btn-sm btn-soft-danger" href="{{route('modevaldestroy',$modinfraction->id)}}"><i class="bx bx-fw bx bx-trash"></i></a>
                @endif
              </td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
      </tbody>
    </table>
    </div>
</div>
{!! Form::close() !!}

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
