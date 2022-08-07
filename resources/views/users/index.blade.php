@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') User @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $search_opt = isset($_GET['search_opt']) ? $_GET['search_opt'] : '';
  $word_search = isset($_GET['k_search']) ? $_GET['k_search'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>
{!! Form::open(array('route' => 'users.index','method'=>'GET')) !!}
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="search_opt" class="form-label">Search by : </label>
          <select class="form-control" name="search_opt" data-choices id="search_opt">
              <option value="" selected disabled hidden>What to search ... </option>
              <option value="name" <?= ($search_opt === 'name' ? "selected" : "") ?>> Name </option>
              <option value="email" <?= ($search_opt === 'email' ? "selected" : "") ?>> Email </option>
          </select>
      </div>
  </div>
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="k_search" class="form-label">Keyword</label>
          <input type="text" name="k_search" value="{{$word_search}}" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search ... " />
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
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @forelse ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
    </td>
  </tr>
  @empty
      <tr><td colspan="5" class="text-muted">No data to be displayed</td></tr>
  @endforelse
</table>
  <div class="d-flex justify-content-center">
    {{ $data->links() }}
  </div>




@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
