<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.starter'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> outer <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> inner  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<h1>we are here!</h1>


<pre>
 <?php echo e(var_dump($data)); ?>   
</pre>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mlbbmodsupport\resources\views/testing.blade.php ENDPATH**/ ?>