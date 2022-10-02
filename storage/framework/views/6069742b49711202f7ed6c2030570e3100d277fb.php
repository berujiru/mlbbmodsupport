
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Deputy Moderator NTE'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Deputy Moderator NTE <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
  $filtered_seen = isset($_GET['filter_seen']) ? $_GET['filter_seen'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>NTE of Moderators under this Deputy</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <?php echo Form::open(array('route' => 'deputy-mods-nte.index','method'=>'GET')); ?>

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
    <div class="col-xs-4 col-sm-4 col-md-4">
      <div class="mb-3">
          <label for="moderator" class="form-label">Already Seen</label>
          <select class="form-control" name="filter_seen" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Filter ... </option>
              <option value=""> -none- </option>
              <option value="1" <?= ($filtered_seen == 1 ? "selected" : "") ?> >Yes</option>
              <option value="0" <?= ($filtered_seen == 0 ? "selected" : "") ?> >No</option>
          </select>
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
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Deputy</th>
              <th scope="col">Mod ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">NTE Code</th>
              <th scope="col">Infraction Date</th>
              <th scope="col">Seen</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e(!empty($nte->profile->deputyteam) ? $nte->profile->deputyteam->profile->firstname." ".$nte->profile->deputyteam->profile->lastname : 'No deputy profile'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($nte->MODID) ? $nte->MODID : 'Mod ID not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($nte->Moderator) ? $nte->Moderator : 'Name not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($nte->UniqueID) ? $nte->UniqueID : 'Code not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($nte->InfractionDate) ? $nte->InfractionDate : 'Data not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($nte->is_seen == 1) ? 'Yes' : 'No'); ?></td>
              <td style="width:5%;">
                <a class="btn btn-sm btn-info" href="<?php echo e(route('deputy-mods-nte.show',$nte->id)); ?>" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/deputy-mods-nte/index.blade.php ENDPATH**/ ?>