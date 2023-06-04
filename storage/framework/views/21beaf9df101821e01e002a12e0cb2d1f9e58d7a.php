
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Deputy Moderator Infraction'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Deputy Moderator Infraction <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
  $q_infra = isset($_GET['q_infra']) ? $_GET['q_infra'] : '';
  $from = isset($_GET['date_range_f']) ? $_GET['date_range_f'] : '';
  $to = isset($_GET['date_range_t']) ? $_GET['date_range_t'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Moderators' Committed Infraction</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <?php echo Form::open(array('route' => 'deputy-mods-infra.index','method'=>'GET')); ?>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="moderator" class="form-label">Moderator</label>
          <select class="form-control" name="mod_id" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select moderator ... </option>
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
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="infraction" class="form-label">Infraction</label>
          <input type="text" name="q_infra" value="<?php echo e($q_infra); ?>" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search committed infraction ... " />
      </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top:9px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
    <br>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="from-date" class="form-label">From</label>
          <input type="text" placeholder="Set Date (From) ..." name="date_range_f"  value="<?= $from ?>" class="form-control" data-provider="flatpickr" data-date-format="M d, Y">
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="to-date" class="to-label">To</label>
          <input type="text" placeholder="Set Date (To) ..." name="date_range_t" value="<?= $to ?>" class="form-control" data-provider="flatpickr" data-date-format="M d, Y">
      </div>
    </div>
  </div>
  <?php echo Form::close(); ?>

  <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <!-- <th scope="col">Team</th> -->
              <!-- <th scope="col">Deputy</th> -->
              <th scope="col">Mod ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">Infraction</th>
              <th scope="col">Date</th>
              <!-- <th scope="col">Action</th> -->
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $at): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <!-- <td style="width:20%;"><?php echo e(!empty($at->modprofile->deputyteam->team) ? $at->modprofile->deputyteam->team->team_name : 'Team not found'); ?></td> -->
              <!-- <td style="width:20%;"><?php echo e(!empty($at->modprofile->deputyteam) ? $at->modprofile->deputyteam->profile->firstname." ".$at->modprofile->deputyteam->profile->lastname : 'No deputy profile'); ?></td> -->
              <td style="width:20%;"><?php echo e(!empty($at->MOD_ID) ? $at->MOD_ID : 'Mod ID not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($at->Moderator) ? $at->Moderator : 'Name not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($at->Form_Attribute) ? $at->Form_Attribute : 'Record not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($at->Date) ? date("m/d/Y",strtotime($at->Date)) : ''); ?></td>
              <!-- <td style="width:5%;">
                <a class="btn btn-sm btn-info" href="<?php echo e(route('deputy-mods.show',$at->Merged)); ?>" title="View Details"><i class="bx bx-fw bx-show bx-xs"></i></a>
              </td> -->
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="6" class="text-muted">No data to be displayed</td></tr>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/deputy-mods-infra/index.blade.php ENDPATH**/ ?>