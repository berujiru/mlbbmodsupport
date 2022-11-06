@extends('layouts.master')
@section('title') @lang('Tickets')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Teams @endslot
@slot('title') Index  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of My Tickets to Developers</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Details</th>
              <th scope="col">Status</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $ticket)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $ticket->created_at }}</td>
              <td style="width:30%;">{{ $ticket->details }}</td>
              <td style="width:30%;">{{ $ticket->status==0? 'active':'done' }}</td>
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
