
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Teams'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Teams <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Edit  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Edit Team <em><?php echo e($team->team_code); ?></em></h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('team.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li><?php echo e($error); ?></li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>

<?php echo Form::model($team, ['route' => ['team.update', $team->team_id],'method' => 'PATCH']); ?>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            <?php echo Form::text('team_code', null, array('placeholder' => 'Team Code','class' => 'form-control','autocomplete'=>'off', 'id'=>'codefloatingInput')); ?>

            <label for="codefloatingInput">Team Code</label>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-floating">
            <?php echo Form::text('team_name', null, array('placeholder' => 'Team Name','class' => 'form-control','autocomplete'=>'off','id'=>'teamNamefloatingInput')); ?>

            <label for="teamNamefloatingInput">Team Name</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i>Update</button>
    </div>
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/team/edit.blade.php ENDPATH**/ ?>