
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.starter'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Evaluation <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Evaluate  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<h2>Mod Infractions</h2>

<?php echo Form::open(array('route' => 'modevalstore','method'=>'POST')); ?>

<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="mb-3">
            <label for="bdayinput" class="form-label">Date
            </label>
            <?php echo e(Form::date('date',date('Y-m-d'),["class"=>"form-control","data-provider"=>"flatpickr"])); ?>  
            <?php $__errorArgs = ['date'];
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
            <label for="skillsInput" class="form-label">Moderator</label>
            <select class="form-control" name="mod_id" data-choices
                 id="modInput">
                <option value="" selected disabled hidden>Choose here</option>
                <?php $__currentLoopData = $mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moderator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($moderator->modid); ?>"><?php echo e($moderator->modid.'- '.$moderator->firstname.' '.$moderator->lastname); ?></option>
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
            <label for="skillsInput" class="form-label">Infraction</label>
            <select class="form-control" name="infractions[]" data-choices multiple id="infractionInput">
                <?php $__currentLoopData = $infractions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infraction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($infraction->id); ?>"><?php echo e($infraction->code.' '.$infraction->detail); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['infractions'];
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
    <div class="col-xs-1 col-sm-1 col-md-1 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i> Save</button>
    </div>
    <div class="card">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Date</th>
              <th scope="col">Moderator</th>
              <th scope="col">Infraction</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $modinfraction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:10%;"><?php echo e(++$i); ?></td>
              <td><?php echo e($modinfraction->date); ?></td>
              <td ><?php echo e(!empty($modinfraction->profile) ? $modinfraction->profile->firstname." ".$modinfraction->profile->lastname : 'No profile found of '.$modinfraction->mod_id); ?></td>
              <td><?php echo e($modinfraction->infraction_code); ?></td>
              <td>
                <?php if($modinfraction->islock==0): ?>
                <a class="btn btn-sm btn-soft-danger" href="<?php echo e(route('modevaldestroy',$modinfraction->id)); ?>"><i class="bx bx-fw bx bx-trash"></i></a>
                <?php endif; ?>
              </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    </div>
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/evaluation/index.blade.php ENDPATH**/ ?>