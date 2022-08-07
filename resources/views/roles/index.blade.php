@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Roles @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $word_search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>
{!! Form::open(array('route' => 'roles.index','method'=>'GET')) !!}
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="search" class="form-label">Search : </label>
          <input type="text" name="search" value="{{$word_search}}" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search ... " />
      </div>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top:16px;">
      <div class="mb-3">
          <br>
          <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
      </div>
  </div>
</div>
{!! Form::close() !!}

<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @forelse ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
           
        </td>
    </tr>
    @empty
        <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
    @endforelse
</table>
<div class="d-flex justify-content-center">
    {{ $roles->links() }}
</div>


@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
