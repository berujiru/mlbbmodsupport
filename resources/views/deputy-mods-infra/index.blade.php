@extends('layouts.master')
@section('title') @lang('Deputy Moderator Infraction')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Deputy Moderator Infraction @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
  $q_infra = isset($_GET['q_infra']) ? $_GET['q_infra'] : '';
  $from = isset($_GET['date_range_f']) ? $_GET['date_range_f'] : '';
  $to = isset($_GET['date_range_t']) ? $_GET['date_range_t'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Moderators' Committed Infraction</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  {!! Form::open(array('route' => 'deputy-mods-infra.index','method'=>'GET')) !!}
  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="moderator" class="form-label">Moderator</label>
          <select class="form-control" name="mod_id" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select moderator ... </option>
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
          <label for="infraction" class="form-label">Infraction</label>
          <input type="text" name="q_infra" value="{{$q_infra}}" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search committed infraction ... " />
      </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top:9px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
    <br>
    <!-- <div class="col-xs-3 col-sm-3 col-md-3">
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
    </div> -->
  </div>
  {!! Form::close() !!}
  <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <!-- <th scope="col">Team</th> -->
              <!-- <th scope="col">Deputy</th> -->
              <th scope="col">Mod ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">Infraction</th>
              <th scope="col">Date</th>
              <!-- <th scope="col">Action</th> -->
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $at)
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <!-- <td style="width:20%;">{{ !empty($at->modprofile->deputyteam->team) ? $at->modprofile->deputyteam->team->team_name : 'Team not found' }}</td> -->
              <!-- <td style="width:20%;">{{ !empty($at->modprofile->deputyteam) ? $at->modprofile->deputyteam->profile->firstname." ".$at->modprofile->deputyteam->profile->lastname : 'No deputy profile' }}</td> -->
              <td style="width:20%;">{{ !empty($at->MOD_ID) ? $at->MOD_ID : 'Mod ID not found' }}</td>
              <td style="width:20%;">{{ !empty($at->Moderator) ? $at->Moderator : 'Name not found' }}</td>
              <td style="width:20%;">{{ !empty($at->Form_Attribute) ? $at->Form_Attribute : 'Record not found' }}</td>
              <td style="width:20%;">{{ !empty($at->Date) ? date("m/d/Y",strtotime($at->Date)) : '' }}</td>
              <!-- <td style="width:5%;">
                <a class="btn btn-sm btn-info" href="{{route('deputy-mods.show',$at->Merged)}}" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
              </td> -->
          </tr>
        @empty
          <tr><td colspan="6" class="text-muted">No data to be displayed</td></tr>
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
