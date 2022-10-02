@extends('layouts.master')
@section('title') @lang('Deputy Moderator NTE')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Deputy Moderator NTE @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
  $filtered_seen = isset($_GET['filter_seen']) ? $_GET['filter_seen'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>NTE of Moderators under this Deputy</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  {!! Form::open(array('route' => 'deputy-mods-nte.index','method'=>'GET')) !!}
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
          <label for="moderator" class="form-label">Already Seen</label>
          <select class="form-control" name="filter_seen" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Filter ... </option>
              <option value=""> -none- </option>
              <option value="1" <?= ($filtered_seen == 1 ? "selected" : "") ?> >Yes</option>
              <option value="0" <?= ($filtered_seen == 0 ? "selected" : "") ?> >No</option>
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
              <th scope="col">Deputy</th>
              <th scope="col">Mod ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">NTE Code</th>
              <th scope="col">Infraction Date</th>
              <th scope="col">Seen</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $nte)
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <td style="width:20%;">{{ !empty($nte->profile->deputyteam) ? $nte->profile->deputyteam->profile->firstname." ".$nte->profile->deputyteam->profile->lastname : 'No deputy profile' }}</td>
              <td style="width:20%;">{{ !empty($nte->MODID) ? $nte->MODID : 'Mod ID not found' }}</td>
              <td style="width:20%;">{{ !empty($nte->Moderator) ? $nte->Moderator : 'Name not found' }}</td>
              <td style="width:20%;">{{ !empty($nte->UniqueID) ? $nte->UniqueID : 'Code not found' }}</td>
              <td style="width:20%;">{{ !empty($nte->InfractionDate) ? $nte->InfractionDate : 'Data not found' }}</td>
              <td style="width:20%;">{{ !empty($nte->is_seen == 1) ? 'Yes' : 'No' }}</td>
              <td style="width:5%;">
                <a class="btn btn-sm btn-info" href="{{route('deputy-mods-nte.show',$nte->id)}}" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
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
