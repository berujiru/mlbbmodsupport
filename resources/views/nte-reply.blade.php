@extends('layouts.master')
@section('title') @lang('NTE Replies')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') NTE Replies @endslot
@slot('title') NTE Replies @endslot
@endcomponent


<?php
    $nte_code_search = isset($_GET['nte_code']) ? $_GET['nte_code'] : '';
    $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
?>

<h2>NTE REPLIES</h2>

{!! Form::open(array('route' => 'ntereply.index','method'=>'GET')) !!}
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
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="mb-3">
            <label for="nte_code" class="form-label">NTE Code</label>
            <input type="text" name="nte_code" value="{{$nte_code_search}}" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search NTE Code" />
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top:6px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
    <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">NTE Code</th>
              <th scope="col">Content</th>
              <th scope="col">Moderator</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $reply)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td>{{ date("M-d-Y",strtotime($reply->created_at)) }}</td>
              <td>{{ $reply->ntecode }}</td>
              <td style="word-wrap: break-word">{{ $reply->content}}</td>
              <td >{{ !empty($reply->nte->profile) ? $reply->nte->profile->firstname." ".$reply->nte->profile->lastname : 'No profile found of MOD ID : '.$reply->nte->MODID }}</td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-info" href="{{route('ntereply.show',$reply->id)}}" title="View Reply"><i class="bx bx-fw bx-show"></i></a>
          </tr>
        @empty
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        @endforelse
      </tbody>
    </table>
    </div>
</div>
{!! Form::close() !!}

@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
