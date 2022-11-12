
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Team Assignment'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Team Assignment <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Assign  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Assign to Team</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('team-assignment.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
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

<?php echo Form::open(array('route' => 'team-assignment.mod-assign','method'=>'POST')); ?>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            <select class="form-select" id="teamSelect" name="team_id">
                <option value="">Select ...</option>
                <?php $__currentLoopData = $list_teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($team->team_id); ?>"><?php echo e($team->team_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label for="teamSelect">Select Team</label>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-floating">
            <select class="form-select" id="profileSelect" name="mods">
                <option value="">Choose ...</option>
                <?php $__currentLoopData = $list_profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pr->id); ?>"><?php echo e($pr->firstname.' '.$pr->lastname); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label for="profileSelect">Select Profile</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i>Save</button>
    </div>
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/team-assignment/mod-assign.blade.php ENDPATH**/ ?>