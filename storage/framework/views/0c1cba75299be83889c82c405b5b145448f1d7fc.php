
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.starter'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Roles <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
  $word_search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
            <a class="btn btn-success" href="<?php echo e(route('roles.create')); ?>"> Create New Role</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php echo Form::open(array('route' => 'roles.index','method'=>'GET')); ?>

<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="search" class="form-label">Search : </label>
          <input type="text" name="search" value="<?php echo e($word_search); ?>" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search ... " />
      </div>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top:16px;">
      <div class="mb-3">
          <br>
          <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
      </div>
  </div>
</div>
<?php echo Form::close(); ?>


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><?php echo e(++$i); ?></td>
        <td><?php echo e($role->name); ?></td>
        <td>
            <a class="btn btn-info" href="<?php echo e(route('roles.show',$role->id)); ?>">Show</a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                <a class="btn btn-primary" href="<?php echo e(route('roles.edit',$role->id)); ?>">Edit</a>
            <?php endif; ?>
           
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
    <?php endif; ?>
</table>
<div class="d-flex justify-content-center">
    <?php echo e($roles->links()); ?>

</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/roles/index.blade.php ENDPATH**/ ?>