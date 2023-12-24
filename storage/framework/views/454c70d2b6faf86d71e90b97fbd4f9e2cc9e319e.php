
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('User Type'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> User Type <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of User Types</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-6">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('user-type.create')); ?>"> <i class="bx bx-fw bx-book-add"></i>Add User Type</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">User Type</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $utype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:10%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($utype->user_type); ?></td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-primary" href="<?php echo e(route('user-type.edit',$utype->user_type_id)); ?>" title="Edit User Type"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('user-type.delete',$utype->user_type_id)); ?>" title="Remove User Type"><i class="bx bx-fw bx bx-trash"></i></a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/user-type/index.blade.php ENDPATH**/ ?>