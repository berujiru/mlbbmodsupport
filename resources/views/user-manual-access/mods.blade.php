@extends('layouts.master')
@section('title') @lang('Assign User Type')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Assign User Type @endslot
@slot('title') Index  @endslot
@endcomponent

<?php
  $search_opt = isset($_GET['search_opt']) ? $_GET['search_opt'] : '';
  $word_search = isset($_GET['k_search']) ? $_GET['k_search'] : '';
  $f_user_type = isset($_GET['f_user_type']) ? $_GET['f_user_type'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Users</h2>
        </div>
    </div>
</div>
<div class="row">
{!! Form::open(array('route' => 'assign-user-type.index','method'=>'GET')) !!}
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top: 10px;">
            <div class="mb-3">
                <label for="search_opt" class="form-label">Search by : </label>
                <select class="form-control" name="search_opt" data-choices id="search_opt">
                    <option value="" selected disabled hidden>What to search ... </option>
                    <option value="mod_id" <?= ($search_opt === 'mod_id' ? "selected" : "") ?>> MOD ID </option>
                    <option value="user_type" <?= ($search_opt === 'user_type' ? "selected" : "") ?>> User Type </option>
                </select>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top: 10px;">
            <div class="mb-3">
                <label for="f_user_type" class="form-label">Status : </label>
                <select class="form-control" name="f_user_type" data-choices id="f_user_type">
                    <option value="" selected disabled hidden>Filter status ... </option>
                    @foreach($user_types as $ut)
                        <option value="{{$ut->user_type_id}}" <?= $ut->user_type_id == $f_user_type ? 'selected' : '' ?>>{{ $ut->user_type }}</option>
                    @endforeach
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
  <div class="col-lg-12">
  <div class="card">
    <!-- start Grids in modals multiple -->
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="vertical-align: middle;" data-bs-target="#userTypeMod">
          <i class="bx bxs-user-detail"></i> Assign User Type
      </button>
        </div>
      </h4>
    </div><!-- end card header -->
    <div class="modal fade" id="userTypeMod" tabindex="-1" aria-labelledby="userTypeModLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="userTypeModLabel">Assign User Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="frmMultiple">
                    <div class="row g-3">
                      <div class="col-xxl-12">
                            <div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="mod_users" class="form-label">Select Profile : </label>
                                        <br>
                                        <select class="form-control" id="mod_users" name="mod_users" data-choices multiple>
                                            @foreach($list_active_user as $au)
                                                <option value="{{$au->id}}">{{ $au->modid.' - '.$au->firstname." ".$au->lastname }}</option>
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
                                        <label for="user_type" class="form-label">Select User Type: </label>
                                        <br>
                                        <select class="form-control" name="user_type" id="user_type">
                                            @foreach($user_types as $ut)
                                                <option value="{{$ut->user_type_id}}">{{ $ut->user_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="clear_select()">Close</button>
                                <button type="button" class="btn btn-primary" id="btnSubmit" onclick="assign_user_type()">Assign</button>
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
              <th scope="col">MOD ID</th>
              <th scope="col">Fullname</th>
              <th scope="col">User Type</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        @forelse($data as $key => $prof)
        <?php
            $mi = !empty($prof->middlename) ? " ".substr($prof->middlename,0,1).". " : " ";
            $fullname = $prof->firstname.$mi.$prof->lastname;
        ?>
          <tr>
              <td style="width:10%;">{{++$i}}</td>
              <td style="width:20%;">{{ $prof->modid }}</td>
              <td style="width:20%;"><?= $fullname; ?></td>
              <td style="width:20%;">{{ $prof->usertype->user_type }}</td>
              <td style="width:15%;">
                <!-- <a class="btn btn-sm btn-primary" href="{{route('user-type.assign-multiple',$prof->modid)}}" title="Update User Type"><i class="bx bx-fw bxs-user-detail bx bx-xs"></i></a> -->
                 <!-- start Grids in modals single -->
                <div class="modal fade" id="userTypeModSingle<?= $prof->id ?>" tabindex="-1" aria-labelledby="userTypeModSingleLabel<?= $prof->id ?>" aria-modal="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="userTypeModSingleLabel<?= $prof->id ?>">Update User Type</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0);" id="frmSingle<?= $prof->id ?>">
                                <div class="row g-3">
                                <label class="form-label">Moderator: </label>
                                <input type="text" disabled value="<?= $fullname ?>" autocomplete="off" class="form-control">
                                    <div class="col-xxl-12">
                                        <div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="user_type" class="form-label">Select User Type: </label>
                                                    <br>
                                                    <select class="form-control" name="user_type<?= $prof->id ?>" id="user_type<?= $prof->id ?>">
                                                        @foreach($user_types as $ut)
                                                            <option value="{{$ut->user_type_id}}" <?= $prof->user_type_id == $ut->user_type_id ? 'selected' : '' ?>>{{ $ut->user_type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="clear_select()">Close</button>
                                            <button type="button" class="btn btn-primary" id="btnSubmit" onclick="assign_user_type_single(<?= $prof->id ?>)">Assign</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <!-- end Grids in modals single -->
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" title="Update User Type" style="vertical-align: middle;" data-bs-target="#userTypeModSingle<?= $prof->id ?>"><i class="bx bx-fw bxs-user-detail bx bx-xs"></i></button>
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
<script src="{{ URL::asset('/assets/js/pages/modal.init.js') }}"></script>
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#search_opt').on('change', function() {
    //         var search_opt = $('#search_opt').val();
    //         //alert(search_opt);
    //         if(search_opt == 'mod_id') {
    //             $('#f_user_type').val('');
    //             $('#f_user_type').prop("disabled", true);
    //             $('#k_search').prop("disabled", false);
    //             $('#f_user_type').attr("disabled","disabled");
    //             $('#k_search').removeAttr("disabled");
    //             alert(search_opt);
    //         } else {
    //             $('#k_search').val('');
    //             $('#k_search').prop("disabled", true);
    //             $('#f_user_type').prop("disabled", false);
    //             $('#k_search').attr("disabled", true);
    //             $('#k_search').attr("disabled","disabled");
    //             $('#f_user_type').removeAttr("disabled");
    //             alert(search_opt);
    //         }
    //     });
    // });

    function assign_user_type(){
        var profiles = $('#mod_users').val();
        var user_type = $('#user_type').val();
        $.ajax({
            url: '/assign-user-type/assign-multiple',
            dataType: 'json',
            method: 'POST',
            data: {'profiles':profiles,'multiple':1,'user_type':user_type, _token: "{{ csrf_token() }}"},
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

    function assign_user_type_single(profiles){
        //var select_name = "'#"+selected_type+"'";
        var user_type = $('#user_type'+profiles).val();
        $.ajax({
            url: '/assign-user-type/assign-multiple',
            dataType: 'json',
            method: 'POST',
            data: {'profiles':profiles,'multiple':0,'user_type':user_type, _token: "{{ csrf_token() }}"},
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
</script>
@endsection
