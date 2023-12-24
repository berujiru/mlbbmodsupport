
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('User Manual Access'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> User Manual Access <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Edit  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Edit User Manual Access</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('user-manual-access.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
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

<?php echo Form::model($data, ['route' => ['user-manual-access.update', $data->user_manual_access_id],'method' => 'PATCH']); ?>

    <div class="row g-3">
        <div class="col-xxl-12">
            <div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="user_type" class="form-label">User Type </label>
                        <select class="form-control" name="user_type" id="user_type" required>
                            <option value="">Select User Type ...</option>
                            <?php $__currentLoopData = $user_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ut->user_type_id); ?>" <?= $ut->user_type_id == $data->user_type_id ? 'selected' : '' ?>><?php echo e($ut->user_type); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xxl-12">
            <div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="user_manual" class="form-label">User Manual </label>
                        <select class="form-control" name="user_manual" id="user_manual"  data-choices data-choices-removeitem required>
                            <option value="">Select User Manual ...</option>
                            <?php $__currentLoopData = $user_manuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $um): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($um->user_manual_id); ?>" <?= $um->user_manual_id == $data->user_manual_id ? 'selected' : '' ?>><?php echo e($um->manual_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
            <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-save"></i>Update</button>
        </div>
        </div><!--end col-->
    </div><!--end row-->
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/user-manual-access/edit.blade.php ENDPATH**/ ?>