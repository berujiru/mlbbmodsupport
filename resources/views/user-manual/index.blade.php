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
      @if(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods'))
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('user-manual.create') }}"> <i class="bx bx-fw bx-upload"></i> Upload Users Manual</a>
        </div>
      @endif
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Manual</th>
              <th scope="col">Description</th>
              <th scope="col">File Size</th>
              <th scope="col">Uploader</th>
              <th scope="col">Date Attached/Reattached</th>
              <th scope="col">Link</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $manual)
          @if(($manual->user_manual_id == 1 && Auth::user()->hasRole('Deputy')))
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <td style="width:20%;">{{ $manual->manual_name }}</td>
              <td style="width:30%;">{{ $manual->manual_description ?? '-' }}</td>
              <td style="width:5%;">{{ $manual->file_size ?? '-' }}</td>
              <td style="width:20%;">{{ !empty($manual->reattached_by) ? $manual->reattachedby->firstname." ".$manual->reattachedby->lastname : $manual->uploadedby->firstname." ".$manual->uploadedby->lastname }}</td>
              <td style="width:20%;">{{ !empty($manual->date_reattached) ? date('d M Y h:i A',strtotime($manual->date_reattached)) : date('d M Y h:i A',strtotime($manual->date_attached)) }}</td>
              <td style="width:30%;">
                @if(($manual->user_manual_id == 1 && Auth::user()->hasRole('Deputy')))
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="{{ route('user-manual.show',[$manual->user_manual_id,$manual->manual_name]) }}"><i class="bx bx-fw bxs-file-pdf"></i></a>
                @elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods'))
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="{{ route('user-manual.show',[$manual->user_manual_id,$manual->manual_name]) }}"><i class="bx bx-fw bxs-file-pdf"></i></a>
                @endif
                @if(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods'))
                <a class="btn btn-sm btn-primary" href="{{route('user-manual.edit',$manual->user_manual_id)}}" title="Update User Manual"><i class="bx bx-fw bx-upload"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('user-manual.delete',$manual->user_manual_id)}}" title="Delete User Manual"><i class="bx bx-fw bx-trash"></i></a>
                @endif
              </td>
          </tr>
          @elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods'))
          <tr>
              <td style="width:5%;">{{++$i}}</td>
              <td style="width:20%;">{{ $manual->manual_name }}</td>
              <td style="width:30%;">{{ $manual->manual_description ?? '-' }}</td>
              <td style="width:5%;">{{ $manual->file_size ?? '-' }}</td>
              <td style="width:20%;">{{ !empty($manual->reattached_by) ? $manual->reattachedby->firstname." ".$manual->reattachedby->lastname : $manual->uploadedby->firstname." ".$manual->uploadedby->lastname }}</td>
              <td style="width:20%;">{{ !empty($manual->date_reattached) ? date('d M Y h:i A',strtotime($manual->date_reattached)) : date('d M Y h:i A',strtotime($manual->date_attached)) }}</td>
              <td style="width:30%;">
                @if(($manual->user_manual_id == 1 && Auth::user()->hasRole('Deputy')))
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="{{ route('user-manual.show',[$manual->user_manual_id,$manual->manual_name]) }}"><i class="bx bx-fw bxs-file-pdf"></i></a>
                @elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods'))
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="{{ route('user-manual.show',[$manual->user_manual_id,$manual->manual_name]) }}"><i class="bx bx-fw bxs-file-pdf"></i></a>
                @endif
                @if(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods'))
                <a class="btn btn-sm btn-primary" href="{{route('user-manual.edit',$manual->user_manual_id)}}" title="Update User Manual"><i class="bx bx-fw bx-upload"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('user-manual.delete',$manual->user_manual_id)}}" title="Delete User Manual"><i class="bx bx-fw bx-trash"></i></a>
                @endif
              </td>
          </tr>
          @endif
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
