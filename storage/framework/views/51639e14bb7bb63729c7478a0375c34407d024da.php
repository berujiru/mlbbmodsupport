
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Team Assignment'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Team Assignment <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Team Assignment</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('team-assignment.create')); ?>"> <i class="bx bx-fw bx-book-add"></i>Assign Team</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Team Name</th>
              <th scope="col">MOD ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">Assigned By</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <td style="width:10%;"><?php echo e($mod->team_code); ?></td>
              <td style="width:20%;"><?php echo e($mod->name_team); ?></td>
              <td style="width:10%;"><?php echo e($mod->modid); ?></td>
              <td style="width:20%;"><?php echo e($mod->firstname.' '.$mod->lastname); ?></td>
              <td style="width:20%;"><?php echo e(!empty($mod->assigned_by) ? $mod->assigned_by : null); ?></td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('team-assignment.remove',$mod->id)); ?>" title="Remove from Team"><i class="bx bx-fw bx bx-trash"></i></a>
              </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center">
    <?php echo e($data->links()); ?>

  </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/team-assignment/index.blade.php ENDPATH**/ ?>