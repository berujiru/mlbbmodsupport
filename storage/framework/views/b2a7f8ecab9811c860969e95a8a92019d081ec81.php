
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Moderator Score Summary'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Moderator Score Summary <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
  $year_start  = 2019;
  $year_now = date('Y'); // current year

  $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
  $team_id_selected = isset($_GET['team_id']) ? $_GET['team_id'] : '';
  //$month_selected = isset($_GET['month']) ? $_GET['month'] : date('m');
  //$year_selected = isset($_GET['year']) ? $_GET['year'] : $year_now;
  $from = isset($_GET['date_range_f']) ? $_GET['date_range_f'] : '';
  $to = isset($_GET['date_range_t']) ? $_GET['date_range_t'] : '';
  $type_summary = isset($_GET['type_summary']) ? $_GET['type_summary'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Moderators Score Summary</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <?php echo Form::open(array('route' => 'score-summary.index','method'=>'GET')); ?>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
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
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="team" class="form-label">Team</label>
          <select class="form-control" name="team_id" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select team </option>
              <option value=""> -none- </option>
              <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($team->team_id); ?>" <?= ($team_id_selected == $team->team_id ? "selected" : "") ?> ><?php echo e($team->team_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <?php $__errorArgs = ['team_id'];
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
    <br>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="moderator" class="form-label">From</label>
          <input type="text" placeholder="Set Date (From) ..." name="date_range_f"  value="<?= $from ?>" class="form-control" data-provider="flatpickr" data-date-format="M d, Y">
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <label for="moderator" class="form-label">To</label>
          <input type="text" placeholder="Set Date (To) ..." name="date_range_t" value="<?= $to ?>" class="form-control" data-provider="flatpickr" data-date-format="M d, Y">
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
      <div class="mb-3">
          <div class="mb-3">
          <label for="moderator" class="form-label">Type of Summary</label>
          <select class="form-control" name="type_summary" data-choices
                id="modInput">
              <option value="" selected disabled hidden>Select ... </option>
              <option value=""> -none- </option>
              <option value="1" <?= ($type_summary == 1 ? "selected" : "") ?>>Monthly</option>
              <option value="2" <?= ($type_summary == 2 ? "selected" : "") ?>>All</option>
          </select>
      </div>
      </div>
    </div>
  </div>
  <?php echo Form::close(); ?>

  <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Mod ID</th>
              <th scope="col">Moderator</th>
              <th scope="col">Score</th>
              <th scope="col">Month/Year</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:5%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e(!empty($score->MOD_ID) ? $score->MOD_ID : 'Mod ID not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($score->MODERATOR) ? $score->MODERATOR : 'Name not found'); ?></td>
              <td style="width:20%;"><?php echo e(!empty($score->overall_score) ? $score->overall_score : 'Score not found'); ?></td>
              <td style="width:20%;<?= $type_summary == 2 ? 'color: #009900;font-weight:bold;' : '' ?>"><?php echo e(!empty($score->month_yr) && $type_summary == 1 ? date("M-Y",strtotime($score->month_yr)) : ($type_summary == 2 ? 'OVERALL SUMMARY' : '')); ?></td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/score-summary/index.blade.php ENDPATH**/ ?>