@extends('layouts.master')
@section('title') @lang('Attributes')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Attributes @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $word_search = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Attributes</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  {!! Form::open(array('route' => 'attribute.index','method'=>'GET')) !!}
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="keyword" class="form-label">Search Attribute</label>
          <input type="text" name="keyword" value="{{$word_search}}" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search ... " />
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
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('attribute.create') }}"> <i class="bx bx-fw bx-book-add"></i>Add Attribute</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Attribute</th>
              <th scope="col">Added by</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $attrib)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $attrib->attribute_name }}</td>
              <td style="width:30%;">{{ !empty($attrib->createdby) ? $attrib->createdby->firstname." ".$attrib->createdby->lastname : null }}</td>
              <td style="width:10%;">
                <a class="btn btn-sm btn-info" href="{{route('attribute.show',$attrib->attribute_id)}}" title="View Attribute"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="{{route('attribute.edit',$attrib->attribute_id)}}" title="Edit Attribute"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('attribute.delete',$attrib->attribute_id)}}"><i class="bx bx-fw bx bx-trash"></i></a>
              </td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-muted">No data to be displayed</td></tr>
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
