@extends('layouts.master')
@section('title') @lang('User Type')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') User Type @endslot
@slot('title') Index  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of User Types</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-6">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('user-type.create') }}"> <i class="bx bx-fw bx-book-add"></i>Add User Type</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">User Type</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $utype)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $utype->user_type }}</td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-primary" href="{{route('user-type.edit',$utype->user_type_id)}}" title="Edit User Type"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('user-type.delete',$utype->user_type_id)}}" title="Remove User Type"><i class="bx bx-fw bx bx-trash"></i></a>
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
