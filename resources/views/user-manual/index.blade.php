@extends('layouts.master')
@section('title') @lang('Users Manual')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Manual @endslot
@slot('title') Index  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Users Manual</h2>
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
              <th scope="col">Manual</th>
              <th scope="col">Description</th>
              <th scope="col">Link</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $manual)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $manual->manual_name }}</td>
              <td style="width:30%;">{{ $manual->manual_description ?? '-' }}</td>
              <td style="width:30%;"><a target="_blank" style="font-size:30px;" title="Click to View" href="{{ route('user-manual.show') }}"><i class="bx bxs-file-pdf"></i></a></td>
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
