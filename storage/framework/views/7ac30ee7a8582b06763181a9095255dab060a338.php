
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Team Deputy Historical Changes'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Team Deputy Historical Changes <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Team Deputy History</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Team</th>
              <th scope="col">Previous Assigned Deputy</th>
              <th scope="col">Date Changed</th>
              <th scope="col">Changed by</th>
              <th scope="col">Action Taken</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e(!empty($dep->team) ? $dep->team->team_name : 'Team not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($dep->profile) ? $dep->profile->firstname." ".$dep->profile->lastname : 'No deputy profile'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($dep->date_changed) ? date("m/d/Y h:i:s A",strtotime($dep->date_changed)) : null); ?></td>
              <td style="width:20%;"><?php echo e(!empty($dep->createdby) ? $dep->createdby->firstname." ".$dep->createdby->lastname : null); ?></td>
              <td style="width:10%;"><?= ($dep->action_taken == 2) ? "<label class='badge bg-danger text-wrap'>DELETE</label>" : "<label class='badge bg-primary text-wrap'>UPDATE</label>" ?></td>
              <td style="width:5%;">
                <a class="btn btn-sm btn-info" href="<?php echo e(route('team-deputy-history.show',$dep->deputy_team_history_id)); ?>" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mlbbmodsupport\resources\views/team-deputy-history/index.blade.php ENDPATH**/ ?>