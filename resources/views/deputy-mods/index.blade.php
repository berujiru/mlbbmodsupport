@extends('layouts.master')
@section('title') @lang('Deputy Moderator Score')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Deputy Moderator Score @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
  $filtered_score = isset($_GET['filter_score']) ? $_GET['filter_score'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Moderators Score</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  {!! Form::open(array('route' => 'deputy-mods.index','method'=>'GET')) !!}
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
      <div class="mb-3">
          <label for="moderator" class="form-label">Moderator</label>
          <select class="form-control" name="mod_id" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select moderator </option>
              <option value=""> -none- </option>
              @foreach($mods as $moderator)
                  <option value="{{$moderator->modid}}" <?= ($mod_id_selected == $moderator->modid ? "selected" : "") ?> >{{ $moderator->modid.'- '.$moderator->firstname.' '.$moderator->lastname}}</option>
              @endforeach
          </select>
          @error('mod_id')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
      <div class="mb-3">
          <label for="moderator" class="form-label">Score</label>
          <select class="form-control" name="filter_score" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Filter ... </option>
              <option value=""> -none- </option>
              <option value="1" <?= ($filtered_score == 1 ? "selected" : "") ?> >Perfect Score</option>
              <option value="2" <?= ($filtered_score == 2 ? "selected" : "") ?> >Less than 100%</option>
          </select>
      </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top:9px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
  </div>
  {!! Form::close() !!}
  <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <!-- <th scope="col">Team</th> -->
              <th scope="col">Deputy</th>
              <th scope="col">Mod ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">Score</th>
              <th scope="col">Details</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $score)
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <!-- <td style="width:20%;">{{ !empty($score->modprofile->deputyteam->team) ? $score->modprofile->deputyteam->team->team_name : 'Team not found' }}</td> -->
              <td style="width:20%;">{{ !empty($score->modprofile->deputyteam) ? $score->modprofile->deputyteam->profile->firstname." ".$score->modprofile->deputyteam->profile->lastname : 'No deputy profile' }}</td>
              <td style="width:20%;">{{ !empty($score->MOD_ID) ? $score->MOD_ID : 'Mod ID not found' }}</td>
              <td style="width:20%;">{{ !empty($score->Moderator) ? $score->Moderator : 'Name not found' }}</td>
              <td style="width:20%;">{{ !empty($score->OVERALLSCORE) ? $score->OVERALLSCORE : 'Score not found' }}</td>
              <td style="width:20%;">{{ !empty($score->Date) ? date("m/d/Y",strtotime($score->Date)) : '' }}</td>
              <td style="width:5%;">
                <a class="btn btn-sm btn-info" href="{{route('deputy-mods.show',$score->Merged)}}" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
              </td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center">
    {{ $data->links() }}
  </div>
  </div>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
