@extends('layouts.master')
@section('title') @lang('Team Deputy Historical Changes')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Team Deputy Historical Changes @endslot
@slot('title') Index  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Team Deputy History</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Team</th>
              <th scope="col">Previous Assigned Deputy</th>
              <th scope="col">Date Changed</th>
              <th scope="col">Changed by</th>
              <th scope="col">Action Taken</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $dep)
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <td style="width:20%;">{{ !empty($dep->team) ? $dep->team->team_name : 'Team not found' }}</td>
              <td style="width:20%;">{{ !empty($dep->profile) ? $dep->profile->firstname." ".$dep->profile->lastname : 'No deputy profile' }}</td>
              <td style="width:20%;">{{ !empty($dep->date_changed) ? date("m/d/Y h:i:s A",strtotime($dep->date_changed)) : null }}</td>
              <td style="width:20%;">{{ !empty($dep->createdby) ? $dep->createdby->firstname." ".$dep->createdby->lastname : null }}</td>
              <td style="width:10%;"><?= ($dep->action_taken == 2) ? "<label class='badge bg-danger text-wrap'>DELETE</label>" : "<label class='badge bg-primary text-wrap'>UPDATE</label>" ?></td>
              <td style="width:5%;">
                <a class="btn btn-sm btn-info" href="{{route('team-deputy-history.show',$dep->deputy_team_history_id)}}" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
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
