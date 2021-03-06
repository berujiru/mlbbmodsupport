
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Teams'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Teams <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Teams</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('team.create')); ?>"> <i class="bx bx-fw bx-book-add"></i>Add Team</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Team Name</th>
              <th scope="col">Added by</th>
              <th scope="col">Team Status</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:10%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($team->team_code); ?></td>
              <td style="width:30%;"><?php echo e($team->team_name); ?></td>
              <td style="width:20%;"><?php echo e(!empty($team->createdby) ? $team->createdby->firstname." ".$team->createdby->lastname : null); ?></td>
              <td style="width:20%;"><?= !empty($team->teamstatus) ? ($team->status_id == 1 ? "<label class='badge bg-success text-wrap'>".$team->teamstatus->status."</label>" : "<label class='badge bg-danger text-wrap'>".$team->teamstatus->status."</label>" ) : null ?></td>
              <td style="width:15%;">
                <a class="btn btn-sm btn-info" href="<?php echo e(route('team.show',$team->team_id)); ?>" title="View Team"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="<?php echo e(route('team.edit',$team->team_id)); ?>" title="Edit Team"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('team.delete',$team->team_id)); ?>" title="Remove Team"><i class="bx bx-fw bx bx-trash"></i></a>
                <a <?= ($team->status_id == 2 ? 'class="btn btn-sm btn-success" title="Enable"' : 'class="btn btn-sm btn-danger" title="Disable"') ?> href="<?php echo e(route('team.enable',$team->team_id)); ?>"><?= ($team->status_id == 2 ? '<i class="bx bx-check-circle"></i>' : '<i class="bx bx-block"></i>') ?></a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8\htdocs\mlbbmodsupport\resources\views/team/index.blade.php ENDPATH**/ ?>