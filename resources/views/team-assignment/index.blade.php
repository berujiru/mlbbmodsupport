@extends('layouts.master')
@section('title') @lang('Team Assignment')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Team Assignment @endslot
@slot('title') Index  @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Team Assignment</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('team-assignment.create') }}"> <i class="bx bx-fw bx-book-add"></i>Assign Team</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Team Name</th>
              <th scope="col">MOD ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">Assigned By</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $mod)
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <td style="width:10%;">{{ $mod->team_code }}</td>
              <td style="width:20%;">{{ $mod->name_team }}</td>
              <td style="width:10%;">{{ $mod->modid }}</td>
              <td style="width:20%;">{{ $mod->firstname.' '.$mod->lastname }}</td>
              <td style="width:20%;">{{ !empty($mod->assigned_by) ? $mod->assigned_by : null }}</td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-danger" href="{{route('team-assignment.remove',$mod->id)}}" title="Remove from Team"><i class="bx bx-fw bx bx-trash"></i></a>
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
