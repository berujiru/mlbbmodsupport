@extends('layouts.master')
@section('title') @lang('Birthday Cards')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Birthday Cards @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Birthday Cards</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  {!! Form::open(array('route' => 'birthday-card.index','method'=>'GET')) !!}
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
    <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top:9px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
  </div>
  {!! Form::close() !!}
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('birthday-card.create') }}"> <i class="bx bx-fw bx-image-add"></i>Upload Birthday Card</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">MOD ID</th>
              <th scope="col">Name</th>
              <th scope="col">Birthday (MM/DD/YYYY)</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $bd)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $bd->mod_id }}</td>
              <td style="width:30%;">{{ !empty($bd->profile) ? $bd->profile->firstname." ".$bd->profile->lastname : 'Profile not found' }}</td>
              <td style="width:30%;">{{ !empty($bd->profile->birthday) ? date("m/d/Y",strtotime($bd->profile->birthday)) : 'Birthday not specified' }}</td>
              <td style="width:10%;">
                <a class="btn btn-sm btn-info" href="{{route('birthday-card.show',$bd->id)}}" title="View Birthday Card"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="{{route('birthday-card.edit',$bd->id)}}" title="Update Birthday Card"><i class="bx bx-fw bx-image bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('birthday-card.delete',$bd->id)}}" title="Delete Birthday Card"><i class="bx bx-fw bx-trash"></i></a>
              </td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  </div>
  <div class="d-flex justify-content-center">
      {{ $data->links() }}
  </div>
</div>

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
