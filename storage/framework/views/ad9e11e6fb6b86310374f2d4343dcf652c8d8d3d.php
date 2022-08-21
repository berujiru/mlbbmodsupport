
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Birthday Card'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Birthday Card <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Update  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Birthday Card</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('birthday-card.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
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

<?php echo Form::model($bdpic, ['route' => ['birthday-card.update', $bdpic->id],'method' => 'PATCH','enctype'=>'multipart/form-data','class'=>'needs-validation']); ?>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Birthday Profile</h4>
            </div>
            <div class="card-body">
                <!-- <div class="form-floating"> -->
                    <select class="form-select" id="profileSelect" name="mod_id" required>
                        <option value="">Select Profile ...</option>
                        <?php $__currentLoopData = $list_mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pr->modid); ?>" <?= $bdpic->mod_id == $pr->modid ? 'selected' : '' ?>><?php echo e($pr->firstname.' '.$pr->lastname); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <!-- <label for="profileSelect">Select Profile</label> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Upload Birthday Picture</h4>
            </div>
            <div class="card-body">
            <input type="file" class="form-control <?php $__errorArgs = ['pic_filename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pic_filename" id="input-pic_filename" required>
            <?php $__errorArgs = ['pic_filename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-upload"></i> Upload</button>
    </div>
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/birthday-picture/edit.blade.php ENDPATH**/ ?>