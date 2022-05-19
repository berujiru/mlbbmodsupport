
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.starter'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> User <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>"> Create New User</a>
        </div>
    </div>
</div>


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td><?php echo e(++$i); ?></td>
    <td><?php echo e($user->name); ?></td>
    <td><?php echo e($user->email); ?></td>
    <td>
      <?php if(!empty($user->getRoleNames())): ?>
        <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <label class="badge badge-success"><?php echo e($v); ?></label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </td>
    <td>
       <a class="btn btn-info" href="<?php echo e(route('users.show',$user->id)); ?>">Show</a>
       <a class="btn btn-primary" href="<?php echo e(route('users.edit',$user->id)); ?>">Edit</a>
    </td>
  </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mlbbmodsupport\resources\views/users/index.blade.php ENDPATH**/ ?>