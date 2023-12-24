@extends('layouts.master')
@section('title') @lang('User Manual Access')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') User Manual Access @endslot
@slot('title') Index  @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Access to Users Manual</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-9">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <!-- <a class="btn btn-success" href="{{ route('user-manual-access.create') }}"> <i class="bx bx-fw bx-bookmark-alt-plus"></i>Give Access</a> -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="vertical-align: middle;" data-bs-target="#userTypeMod">
                <i class="bx bx-fw bx-bookmark-alt-plus"></i> Give Access
            </button>
        </div>
      </h4>
    </div><!-- end card header -->

    <!-- start Grids in modals multiple -->
    <div class="modal fade" id="userTypeMod" tabindex="-1" aria-labelledby="userTypeModLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="userTypeModLabel">Give Access to User Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="frmMultiple">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="user_type" class="form-label">User Type </label>
                                        <select class="form-control" name="user_type" id="user_type" required>
                                          <option value="">Select User Type ...</option>
                                            @foreach($user_types as $ut)
                                                <option value="{{$ut->user_type_id}}">{{ $ut->user_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="user_manual" class="form-label">User Manual </label>
                                        <select class="form-control" name="user_manual" id="user_manual"  data-choices data-choices-removeitem multiple required>
                                          <option value="">Select User Manual ...</option>
                                            @foreach($user_manuals as $um)
                                                <option value="{{$um->user_manual_id}}">{{ $um->manual_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="clear_select()">Close</button>
                                <button type="button" class="btn btn-primary" id="btnSubmit" onclick="grant_access()">Assign</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- end Grids in modals multiple -->

    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">User Type (with Access)</th>
              <th scope="col">User Manual</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $um)
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $um->usertype->user_type }}</td>
              <td style="width:20%;">{{ $um->usermanual->manual_name }}</td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-primary" target="_blank" href="{{route('user-manual-access.edit',$um->user_manual_access_id)}}" title="Edit User Manual Access"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="{{route('user-manual-access.delete',$um->user_manual_access_id)}}" title="Remove User Manual Access"><i class="bx bx-fw bx bx-trash"></i></a>
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
<script type="text/javascript">
  function grant_access(){
    
    var user_manual = $('#user_manual').val();
    var user_type = $('#user_type').val();

    //   if(take_action == 1) {
    //     var user_manual = $('#user_manual').val();
    //     var user_type = $('#user_type').val();
    //   } else {
    //     var user_manual = $('#user_manual').val();
    //     var user_type = $('#user_type').val();
    //   }

      $.ajax({
          url: '/user-manual-access/assign-access',
          dataType: 'json',
          method: 'POST',
          data: {'user_manual':user_manual,'multiple':1,'user_type':user_type, _token: "{{ csrf_token() }}"},
          success: function (data) {
              var _icon_s = "";
              Swal.fire({
                  title: '',
                  icon: data.show,
                  html: data.message,
                  showCloseButton: true,
                  showCancelButton: false,
                  focusConfirm: false,
                  confirmButtonText:
                      '<i class="fa fa-thumbs-up"></i> Close!',
                  confirmButtonAriaLabel: 'Close',
                  allowEscapeKey  : false,
              }).then((result) => {
                  // Reload the Page
                  window.location.reload(true);
              });
              Swal.hideLoading();
              
          },
          beforeSend: function (xhr) {
              Swal.showLoading();
          }
      });
  }

//   function grant_access(){
//       var user_manual = $('#user_manual').val();
//       var user_type = $('#user_type').val();
//       $.ajax({
//           url: '/assign-user-type/assign-multiple',
//           dataType: 'json',
//           method: 'POST',
//           data: {'profiles':profiles,'multiple':1,'user_type':user_type, _token: "{{ csrf_token() }}"},
//           success: function (data) {
//               var _icon_s = "";
//               Swal.fire({
//                   title: '',
//                   icon: data.show,
//                   html: data.message,
//                   showCloseButton: true,
//                   showCancelButton: false,
//                   focusConfirm: false,
//                   confirmButtonText:
//                       '<i class="fa fa-thumbs-up"></i> Close!',
//                   confirmButtonAriaLabel: 'Close',
//                   allowEscapeKey  : false,
//               }).then((result) => {
//                   // Reload the Page
//                   window.location.reload(true);
//               });
//               Swal.hideLoading();
              
//           },
//           beforeSend: function (xhr) {
//               Swal.showLoading();
//           }
//       });
//   }
</script>
@endsection
