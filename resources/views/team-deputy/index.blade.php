@extends('layouts.master')
@section('title') @lang('Team Deputy')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Team Deputy @endslot
@slot('title') Index  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Team Deputy</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('team-deputy.create') }}"> <i class="bx bx-fw bx-book-add"></i>Assign Deputy</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Team</th>
              <th scope="col">Deputy</th>
              <th scope="col">Assigned by</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $dep)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ !empty($dep->team) ? $dep->team->team_name : 'Team not found' }}</td>
              <td style="width:30%;">{{ !empty($dep->profile) ? $dep->profile->firstname." ".$dep->profile->lastname : 'No deputy profile' }}</td>
              <td style="width:30%;">{{ !empty($dep->createdby) ? $dep->createdby->firstname." ".$dep->createdby->lastname : null }}</td>
              <td style="width:10%;">
                <a class="btn btn-sm btn-info" href="{{route('team-deputy.show',$dep->deputy_team_id)}}" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="{{route('team-deputy.edit',$dep->deputy_team_id)}}" title="Edit Details"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <!-- <a class="btn btn-sm btn-danger" href="{{route('team-deputy.destroy',$dep->deputy_team_id)}}"><i class="bx bx-fw bx bx-trash"></i></a> -->
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
