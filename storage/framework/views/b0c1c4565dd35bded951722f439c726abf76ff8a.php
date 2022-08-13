
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.starter'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> User <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
  $search_opt = isset($_GET['search_opt']) ? $_GET['search_opt'] : '';
  $word_search = isset($_GET['k_search']) ? $_GET['k_search'] : '';
?>

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
<?php echo Form::open(array('route' => 'users.index','method'=>'GET')); ?>

<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="search_opt" class="form-label">Search by : </label>
          <select class="form-control" name="search_opt" data-choices id="search_opt">
              <option value="" selected disabled hidden>What to search ... </option>
              <option value="name" <?= ($search_opt === 'name' ? "selected" : "") ?>> Name </option>
              <option value="email" <?= ($search_opt === 'email' ? "selected" : "") ?>> Email </option>
          </select>
      </div>
  </div>
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="k_search" class="form-label">Keyword</label>
          <input type="text" name="k_search" value="<?php echo e($word_search); ?>" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search ... " />
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
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr><td colspan="5" class="text-muted">No data to be displayed</td></tr>
  <?php endif; ?>
</table>
  <div class="d-flex justify-content-center">
    <?php echo e($data->links()); ?>

  </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mlbbmodsupport\resources\views/users/index.blade.php ENDPATH**/ ?>