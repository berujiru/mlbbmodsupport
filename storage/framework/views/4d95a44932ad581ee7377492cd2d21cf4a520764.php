
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Birthday Cards'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Birthday Cards <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Birthday Cards</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <?php echo Form::open(array('route' => 'birthday-card.index','method'=>'GET')); ?>

  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
      <div class="mb-3">
          <label for="moderator" class="form-label">Moderator</label>
          <select class="form-control" name="mod_id" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select moderator </option>
              <option value=""> -none- </option>
              <?php $__currentLoopData = $mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moderator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($moderator->modid); ?>" <?= ($mod_id_selected == $moderator->modid ? "selected" : "") ?> ><?php echo e($moderator->modid.'- '.$moderator->firstname.' '.$moderator->lastname); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <?php $__errorArgs = ['mod_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="alert alert-danger"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top:9px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
  </div>
  <?php echo Form::close(); ?>

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
  <div class="d-flex justify-content-center">
      <?php echo e($data->links()); ?>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8\htdocs\mlbbmodsupport\resources\views/birthday-picture/index.blade.php ENDPATH**/ ?>