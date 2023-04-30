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
  $f_status = isset($_GET['f_status']) ? $_GET['f_status'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>User Account</h2>
        </div>
    </div>
</div>

<!-- Grids in modals -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" style="vertical-align: middle;" data-bs-target="#deactivateMod">
    <i class="bx bx-block"></i> Deactivate Multiple Accounts
</button>
<div class="modal fade" id="deactivateMod" tabindex="-1" aria-labelledby="deactivateModLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="deactivateModLabel">Deactivate Accounts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="frmMultiple">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="email_add" class="form-label">Select Email Address : </label>
                                        <br>
                                        <span class="badge bg-info">Note : Ø means MOD ID not found.</span>
                                        <select class="form-control" name="email_add" data-choices data-choices-removeItem multiple id="email_add" multiple>
                                            <!-- <option value="" selected disabled hidden>Select email ... </option> -->
                                            <!-- <option value="uname" <?= ($search_opt === 'uname' ? "selected" : "") ?>> Username </option>
                                            <option value="email" <?= ($search_opt === 'email' ? "selected" : "") ?>> Email </option>
                                            <option value="mod_id" <?= ($search_opt === 'mod_id' ? "selected" : "") ?>> MOD ID </option> -->
                                            @foreach($list_active_user as $au)
                                                <option value="{{$au->id}}">{{ $au->name." (".($au->fullname->modid ?? 'Ø')." - ".$au->email.")" }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="clear_select()">Close</button>
                                <button type="button" class="btn btn-primary" id="btnSubmit" onclick="deactEmail()">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>


{!! Form::open(array('route' => 'deactivate-user.index','method'=>'GET')) !!}
<div class="row">
  <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="search_opt" class="form-label">Search by : </label>
          <select class="form-control" name="search_opt" data-choices id="search_opt">
              <option value="" selected disabled hidden>What to search ... </option>
              <option value="uname" <?= ($search_opt === 'uname' ? "selected" : "") ?>> Username </option>
              <option value="email" <?= ($search_opt === 'email' ? "selected" : "") ?>> Email </option>
              <option value="mod_id" <?= ($search_opt === 'mod_id' ? "selected" : "") ?>> MOD ID </option>
          </select>
      </div>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="f_status" class="form-label">Status : </label>
          <select class="form-control" name="f_status" data-choices id="f_status">
              <option value="" selected disabled hidden>Filter status ... </option>
              <option value="1" <?= ($f_status === '1' ? "selected" : "") ?>> Active </option>
              <option value="0" <?= ($f_status === '0' ? "selected" : "") ?>> Inactive </option>
          </select>
      </div>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top: 10px;">
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
   <th>User</th>
   <th>Email</th>
   <th>MOD ID</th>
   <th>Name</th>
   <th width="280px">Action</th>
 </tr>
 @forelse ($data as $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td <?= !empty($user->fullname) ? '' : 'class="text-danger"'?>>{{ !empty($user->fullname) ? $user->fullname->modid : 'MOD ID not found' }}</td>
    <td <?= !empty($user->fullname) ? '' : 'class="text-danger"'?>>{{ !empty($user->fullname) ? $user->fullname->firstname.' '.$user->fullname->lastname : 'Name not found' }}</td>
    <td>
       <a class="btn btn-danger bx-xs" href="{{ route('deactivate-user.remove',$user->id) }}" title="Delete Account"><i class="bx bx-block"></i></a>
       <a class="btn btn-primary bx-xs" href="{{ route('deactivate-user.restore',$user->id) }}" title="Restore Account"><i class="bx bx-undo"></i></a>
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
<script src="{{ URL::asset('/assets/js/pages/modal.init.js') }}"></script>
<script type="text/javascript">
    function deactEmail(){

        var email = $('#email_add').val();

        //alert(email);
        //console.log(email);
        $.ajax({
            url: '/deactivate-user/remove-multiple',
            dataType: 'json',
            method: 'POST',
            data: {'email_add':email, _token: "{{ csrf_token() }}"},
            success: function (data) {
                // $('.image-loader').removeClass('img-loader');
                // if(data.response == true) {
                //     thisDialog.setTitle('<span class="glyphicon glyphicon-floppy-saved"></span> Generated');
                //     thisDialog.setMessage(data.message+" <span style='color:#b14300;font-weight:bold;'>Exiting dialog...</span>");
                //     setTimeout(function(){
                //         thisDialog.close();
                //     }, 2000);
                //     //thisDialog.enableButtons(false);
                //     //window.location.reload(true);
                //     $.pjax.reload({container:"#billing-grid-pjax",url: '/billing/billing',replace:false,timeout: false});
                // } else {
                //     thisDialog.setTitle('<span class="glyphicon glyphicon-floppy-remove"></span> Failed to Generate');
                //     thisDialog.setMessage(data.message+" <span style='color:#b14300;font-weight:bold;'>Exiting dialog...</span>");
                //     setTimeout(function(){
                //         thisDialog.close();
                //     }, 2000);
                // }
                //window.location.reload(true);

                var _icon_s = "";

                // if(data.response == true) {
                //     //window.location.reload(true);
                //     _icon_s = "success";
                // } else {
                //     //window.location.reload(true);
                //     _icon
                // }
                //console.log(data);
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
                // $('.image-loader').addClass('img-loader');
                // thisDialog.setTitle('<span class="glyphicon glyphicon-time"></span> Please Wait');
                // thisDialog.setMessage('<div class="text-center"><img src="/images/img-png-loader64.png" alt="Loading..." height="52" width="52"></div>');
                // thisDialog.setClosable(false);
                // thisDialog.enableButtons(false);
                Swal.showLoading();
            }
        });
    }
</script>
@endsection
