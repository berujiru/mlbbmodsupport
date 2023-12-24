
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('User Manual Access'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> User Manual Access <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
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
            <!-- <a class="btn btn-success" href="<?php echo e(route('user-manual-access.create')); ?>"> <i class="bx bx-fw bx-bookmark-alt-plus"></i>Give Access</a> -->
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
                                            <?php $__currentLoopData = $user_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ut->user_type_id); ?>"><?php echo e($ut->user_type); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php $__currentLoopData = $user_manuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $um): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($um->user_manual_id); ?>"><?php echo e($um->manual_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $um): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:10%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($um->usertype->user_type); ?></td>
              <td style="width:20%;"><?php echo e($um->usermanual->manual_name); ?></td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-primary" target="_blank" href="<?php echo e(route('user-manual-access.edit',$um->user_manual_access_id)); ?>" title="Edit User Manual Access"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('user-manual-access.delete',$um->user_manual_access_id)); ?>" title="Remove User Manual Access"><i class="bx bx-fw bx bx-trash"></i></a>
              </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
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
          data: {'user_manual':user_manual,'multiple':1,'user_type':user_type, _token: "<?php echo e(csrf_token()); ?>"},
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
//           data: {'profiles':profiles,'multiple':1,'user_type':user_type, _token: "<?php echo e(csrf_token()); ?>"},
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/user-manual-access/index.blade.php ENDPATH**/ ?>