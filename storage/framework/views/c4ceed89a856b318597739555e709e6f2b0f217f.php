
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Users Manual'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Manual <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Users Manual</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
      <?php if(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods')): ?>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('user-manual.create')); ?>"> <i class="bx bx-fw bx-upload"></i> Upload Users Manual</a>
        </div>
      <?php endif; ?>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Manual</th>
              <th scope="col">Description</th>
              <th scope="col">File Size</th>
              <th scope="col">Uploader</th>
              <th scope="col">Date Attached/Reattached</th>
              <th scope="col">Link</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <?php if(($manual->user_manual_id == 1 && Auth::user()->hasRole('Deputy'))): ?>
          <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($manual->manual_name); ?></td>
              <td style="width:30%;"><?php echo e($manual->manual_description ?? '-'); ?></td>
              <td style="width:5%;"><?php echo e($manual->file_size ?? '-'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($manual->reattached_by) ? $manual->reattachedby->firstname." ".$manual->reattachedby->lastname : $manual->uploadedby->firstname." ".$manual->uploadedby->lastname); ?></td>
              <td style="width:20%;"><?php echo e(!empty($manual->date_reattached) ? date('d M Y h:i A',strtotime($manual->date_reattached)) : date('d M Y h:i A',strtotime($manual->date_attached))); ?></td>
              <td style="width:30%;">
                <?php if(($manual->user_manual_id == 1 && Auth::user()->hasRole('Deputy'))): ?>
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="<?php echo e(route('user-manual.show',[$manual->user_manual_id,$manual->manual_name])); ?>"><i class="bx bx-fw bxs-file-pdf"></i></a>
                <?php elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods')): ?>
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="<?php echo e(route('user-manual.show',[$manual->user_manual_id,$manual->manual_name])); ?>"><i class="bx bx-fw bxs-file-pdf"></i></a>
                <?php endif; ?>
                <?php if(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods')): ?>
                <a class="btn btn-sm btn-primary" href="<?php echo e(route('user-manual.edit',$manual->user_manual_id)); ?>" title="Update User Manual"><i class="bx bx-fw bx-upload"></i></a>
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('user-manual.delete',$manual->user_manual_id)); ?>" title="Delete User Manual"><i class="bx bx-fw bx-trash"></i></a>
                <?php endif; ?>
              </td>
          </tr>
          <?php elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods')): ?>
          <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($manual->manual_name); ?></td>
              <td style="width:30%;"><?php echo e($manual->manual_description ?? '-'); ?></td>
              <td style="width:5%;"><?php echo e($manual->file_size ?? '-'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($manual->reattached_by) ? $manual->reattachedby->firstname." ".$manual->reattachedby->lastname : $manual->uploadedby->firstname." ".$manual->uploadedby->lastname); ?></td>
              <td style="width:20%;"><?php echo e(!empty($manual->date_reattached) ? date('d M Y h:i A',strtotime($manual->date_reattached)) : date('d M Y h:i A',strtotime($manual->date_attached))); ?></td>
              <td style="width:30%;">
                <?php if(($manual->user_manual_id == 1 && Auth::user()->hasRole('Deputy'))): ?>
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="<?php echo e(route('user-manual.show',[$manual->user_manual_id,$manual->manual_name])); ?>"><i class="bx bx-fw bxs-file-pdf"></i></a>
                <?php elseif(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods')): ?>
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="<?php echo e(route('user-manual.show',[$manual->user_manual_id,$manual->manual_name])); ?>"><i class="bx bx-fw bxs-file-pdf"></i></a>
                <?php endif; ?>
                <?php if(Auth::user()->hasRole('HR') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('QA Mods')): ?>
                <a class="btn btn-sm btn-primary" href="<?php echo e(route('user-manual.edit',$manual->user_manual_id)); ?>" title="Update User Manual"><i class="bx bx-fw bx-upload"></i></a>
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('user-manual.delete',$manual->user_manual_id)); ?>" title="Delete User Manual"><i class="bx bx-fw bx-trash"></i></a>
                <?php endif; ?>
              </td>
          </tr>
          <?php else: ?>
            <?php if(!empty($useraccess)): ?>
            <?php
              foreach ($useraccess as $ua) {
                if($ua['user_manual_id'] == $manual->user_manual_id):
            ?>
            <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($manual->manual_name); ?></td>
              <td style="width:30%;"><?php echo e($manual->manual_description ?? '-'); ?></td>
              <td style="width:5%;"><?php echo e($manual->file_size ?? '-'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($manual->reattached_by) ? $manual->reattachedby->firstname." ".$manual->reattachedby->lastname : $manual->uploadedby->firstname." ".$manual->uploadedby->lastname); ?></td>
              <td style="width:20%;"><?php echo e(!empty($manual->date_reattached) ? date('d M Y h:i A',strtotime($manual->date_reattached)) : date('d M Y h:i A',strtotime($manual->date_attached))); ?></td>
              <td style="width:30%;">
                <a target="_blank" class="btn btn-sm btn-info" title="Click to View" href="<?php echo e(route('user-manual.show',[$manual->user_manual_id,$manual->manual_name])); ?>"><i class="bx bx-fw bxs-file-pdf"></i></a>
              </td>
            </tr>          
            <?php
                endif;
              }
            ?>
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
        <?php if(count($useraccess) < 1): ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/user-manual/index.blade.php ENDPATH**/ ?>