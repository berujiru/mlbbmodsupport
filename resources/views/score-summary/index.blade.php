@extends('layouts.master')
@section('title') @lang('Moderator Score Summary')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Moderator Score Summary @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $year_start  = 2019;
  $year_now = date('Y'); // current year

  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
  $team_id_selected = isset($_GET['team_id']) ? $_GET['team_id'] : '';
  //$month_selected = isset($_GET['month']) ? $_GET['month'] : date('m');
  //$year_selected = isset($_GET['year']) ? $_GET['year'] : $year_now;
  $from = isset($_GET['date_range_f']) ? $_GET['date_range_f'] : '';
  $to = isset($_GET['date_range_t']) ? $_GET['date_range_t'] : '';
  $type_summary = isset($_GET['type_summary']) ? $_GET['type_summary'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Moderators Score Summary</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  {!! Form::open(array('route' => 'score-summary.index','method'=>'GET')) !!}
  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
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
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="team" class="form-label">Team</label>
          <select class="form-control" name="team_id" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select team </option>
              <option value=""> -none- </option>
              @foreach($teams as $team)
                  <option value="{{$team->team_id}}" <?= ($team_id_selected == $team->team_id ? "selected" : "") ?> >{{$team->team_name}}</option>
              @endforeach
          </select>
          @error('team_id')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top:9px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
    <br>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="moderator" class="form-label">From</label>
          <input type="text" placeholder="Set Date (From) ..." name="date_range_f"  value="<?= $from ?>" class="form-control" data-provider="flatpickr" data-date-format="M d, Y">
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="moderator" class="form-label">To</label>
          <input type="text" placeholder="Set Date (To) ..." name="date_range_t" value="<?= $to ?>" class="form-control" data-provider="flatpickr" data-date-format="M d, Y">
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <div class="mb-3">
          <label for="moderator" class="form-label">Type of Summary</label>
          <select class="form-control" name="type_summary" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select ... </option>
              <option value=""> -none- </option>
              <option value="1" <?= ($type_summary == 1 ? "selected" : "") ?>>Monthly</option>
              <option value="2" <?= ($type_summary == 2 ? "selected" : "") ?>>All</option>
          </select>
      </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
  <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Mod ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">Score</th>
              <th scope="col">Month/Year</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $score)
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <td style="width:20%;">{{ !empty($score->MOD_ID) ? $score->MOD_ID : 'Mod ID not found' }}</td>
              <td style="width:20%;">{{ !empty($score->MODERATOR) ? $score->MODERATOR : 'Name not found' }}</td>
              <td style="width:20%;">{{ !empty($score->overall_score) ? $score->overall_score : 'Score not found' }}</td>
              <td style="width:20%;<?= $type_summary == 2 ? 'color: #009900;font-weight:bold;' : '' ?>">{{ !empty($score->month_yr) && ($type_summary == 1 || $type_summary == '' ) ? date("M-Y",strtotime($score->month_yr)) : ($type_summary == 2 ? 'OVERALL SUMMARY' : '') }}</td>
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
