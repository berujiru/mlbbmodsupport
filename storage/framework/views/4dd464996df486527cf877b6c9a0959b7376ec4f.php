
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Users Manual'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Users Manual <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Update  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update Users Manual</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('user-manual.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <!-- <li><?php echo e($error); ?></li> -->
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>

<?php echo Form::model($manual, ['route' => ['user-manual.update', $manual->user_manual_id],'method' => 'PATCH','enctype'=>'multipart/form-data','class'=>'needs-validation']); ?>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Manual Name</h4>
            </div>
            <div class="card-body">
                <!-- <div class="form-floating"> -->
                <input type="text" class="form-control <?php $__errorArgs = ['manual_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Input Manual Name..." name="manual_name" id="input-manual_name" value="<?php echo e(!empty($manual->manual_name) ? $manual->manual_name : ''); ?>" required>
                    <!-- <label for="profileSelect">Select Profile</label> -->
                <!-- </div> -->
                <?php $__errorArgs = ['manual_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e('Requires valid input!'); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Manual Description</h4>
            </div>
            <div class="card-body">
                <!-- <div class="form-floating"> -->
                <input type="text" class="form-control <?php $__errorArgs = ['manual_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Input Manual Description..." name="manual_description" id="input-manual_description" value="<?php echo e(!empty($manual->manual_description) ? $manual->manual_description : ''); ?>" required>
                    <!-- <label for="profileSelect">Select Profile</label> -->
                <!-- </div> -->
                <?php $__errorArgs = ['manual_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e('Requires valid input!'); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Upload File</h4>
            </div>
            <div class="card-body">
            <input type="file" class="form-control <?php $__errorArgs = ['file_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="file_name" id="input-filename" <?= !empty($manual->file_name) ? "" : "required" ?>
            <?= !empty($manual->file_name) ? "<br><span style='font-size:11px;'><b class='alert-warning'>Currently Uploaded File:</b> <br><em class='alert-success'><a target='_blank' title='Click to View' href='/user-manual/view/".$manual->user_manual_id."/".$manual->manual_name."'>".$manual->file_name."</a></em></span>" : "" ?>
            <?php $__errorArgs = ['file_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e('Only PDF files are allowed!'); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="margin-top:10px;">
        <button type="submit" class="btn btn-primary"><i class="bx bx-fw bx-upload"></i> Save</button>
    </div>
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/user-manual/edit.blade.php ENDPATH**/ ?>