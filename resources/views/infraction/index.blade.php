@extends('layouts.master')
@section('title') @lang('Infractions')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Infractions @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $search_opt = isset($_GET['search_opt']) ? $_GET['search_opt'] : '';
  $word_search = isset($_GET['k_search']) ? $_GET['k_search'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Infractions</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  {!! Form::open(array('route' => 'infraction.index','method'=>'GET')) !!}
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="search_opt" class="form-label">Search by : </label>
          <select class="form-control" name="search_opt" data-choices id="search_opt">
              <option value="" selected disabled hidden>What to search ... </option>
              <option value="code" <?= ($search_opt === 'code' ? "selected" : "") ?>> Code </option>
              <option value="detail" <?= ($search_opt === 'detail' ? "selected" : "") ?>> Detail </option>
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
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('infraction.create') }}"> <i class="bx bx-fw bx-book-add"></i>Add Infraction</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Detail</th>
              <th scope="col">Added by</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $infra)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $infra->code }}</td>
              <td style="width:30%;">{{ $infra->detail }}</td>
              <td style="width:30%;">{{ !empty($infra->createdby) ? $infra->createdby->firstname." ".$infra->createdby->lastname : null }}</td>
              <td style="width:10%;">
                <a class="btn btn-sm btn-info" href="{{route('infraction.show',$infra->id)}}" title="View Infraction"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="{{route('infraction.edit',$infra->id)}}" title="Edit Infraction"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('infraction.delete',$infra->id)}}"><i class="bx bx-fw bx bx-trash"></i></a>
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
<script text="text/javascript">
$('body').on('click', '.deleteProduct', function () {
     
     var product_id = $(this).data("id");
     confirm("Are You sure want to delete !");
   
     $.ajax({
         type: "DELETE",
         url: "{{ route('infraction.store') }}"+'/'+product_id,
         success: function (data) {
             table.draw();
         },
         error: function (data) {
             console.log('Error:', data);
         }
     });
 });

 Swal.fire({
  title: '<strong>HTML <u>example</u></strong>',
  icon: 'info',
  html:
    'You can use <b>bold text</b>, ' +
    '<a href="//sweetalert2.github.io">links</a> ' +
    'and other HTML tags',
  showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',
  cancelButtonAriaLabel: 'Thumbs down'
})
</script>
@endsection
