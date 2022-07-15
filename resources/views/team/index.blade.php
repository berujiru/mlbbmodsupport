@extends('layouts.master')
@section('title') @lang('Teams')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Teams @endslot
@slot('title') Index  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Teams</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('team.create') }}"> <i class="bx bx-fw bx-book-add"></i>Add Team</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Team Name</th>
              <th scope="col">Added by</th>
              <th scope="col">Team Status</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $team)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $team->team_code }}</td>
              <td style="width:30%;">{{ $team->team_name }}</td>
              <td style="width:20%;">{{ !empty($team->createdby) ? $team->createdby->firstname." ".$team->createdby->lastname : null }}</td>
              <td style="width:20%;"><?= !empty($team->teamstatus) ? ($team->status_id == 1 ? "<label class='badge bg-success text-wrap'>".$team->teamstatus->status."</label>" : "<label class='badge bg-danger text-wrap'>".$team->teamstatus->status."</label>" ) : null ?></td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-info" href="{{route('team.show',$team->team_id)}}" title="View Team"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="{{route('team.edit',$team->team_id)}}" title="Edit Team"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('team.delete',$team->team_id)}}" title="Remove Team"><i class="bx bx-fw bx bx-trash"></i></a>
                <a <?= ($team->status_id == 2 ? 'class="btn btn-sm btn-success" title="Enable"' : 'class="btn btn-sm btn-danger" title="Disable"') ?> href="{{route('team.enable',$team->team_id)}}"><?= ($team->status_id == 2 ? '<i class="bx bx-check-circle"></i>' : '<i class="bx bx-block"></i>') ?></a>
              </td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  </div>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
