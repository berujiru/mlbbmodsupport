
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Attributes-Infraction'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Attributes-Infraction <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Add  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Infraction to Attribute</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('attrib-infra.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
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

<?php echo Form::open(array('route' => 'attrib-infra.store','method'=>'POST')); ?>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-floating">
            <select class="form-select" id="attribSelect" name="attribute_id">
                <option value="">Choose ...</option>
                <?php $__currentLoopData = $list_attrib; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($attrib->attribute_id); ?>"><?php echo e($attrib->attribute_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label for="attribSelect">Select Attribute</label>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-floating">
            <select class="form-select" id="infraSelect" name="infraction_id">
                <option value="">Choose ...</option>
                <?php $__currentLoopData = $list_infra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($infra->id); ?>"><?php echo e($infra->code); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label for="infraSelect">Select Infraction</label>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/attribute-infraction/create.blade.php ENDPATH**/ ?>