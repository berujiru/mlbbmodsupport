
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Birthday Cards'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Birthday Cards <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Birthday Cards</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('birthday-card.create')); ?>"> <i class="bx bx-fw bx-image-add"></i>Upload Birthday Card</a>
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
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:10%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($bd->mod_id); ?></td>
              <td style="width:30%;"><?php echo e(!empty($bd->profile) ? $bd->profile->firstname." ".$bd->profile->lastname : 'Profile not found'); ?></td>
              <td style="width:30%;"><?php echo e(!empty($bd->profile->birthday) ? date("m/d/Y",strtotime($bd->profile->birthday)) : 'Birthday not specified'); ?></td>
              <td style="width:10%;">
                <a class="btn btn-sm btn-info" href="<?php echo e(route('birthday-card.show',$bd->id)); ?>" title="View Birthday Card"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="<?php echo e(route('birthday-card.edit',$bd->id)); ?>" title="Update Birthday Card"><i class="bx bx-fw bx-image bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('birthday-card.delete',$bd->id)); ?>" title="Delete Birthday Card"><i class="bx bx-fw bx-trash"></i></a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/birthday-picture/index.blade.php ENDPATH**/ ?>