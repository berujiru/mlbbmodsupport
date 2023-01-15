
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Attributes-Infraction'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Attributes-Infraction <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Index  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
  $search_opt = isset($_GET['search_opt']) ? $_GET['search_opt'] : '';
  $word_search = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Attributes & Infractions</h2>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
  <!-- <?php echo Form::open(array('route' => 'attribute.index','method'=>'GET')); ?> -->
<!-- <div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="keyword" class="form-label">Search Attribute</label>
          <input type="text" name="keyword" value="<?php echo e($word_search); ?>" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search ... " />
      </div>
  </div>
  <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top:16px;">
      <div class="mb-3">
          <br>
          <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
      </div>
  </div>
</div> -->
<!-- <?php echo Form::close(); ?> -->
<?php echo Form::open(array('route' => 'attrib-infra.index','method'=>'GET')); ?>

<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="search_opt" class="form-label">Search by : </label>
          <select class="form-control" name="search_opt" data-choices id="search_opt">
              <option value="" selected disabled hidden>Select to search option ... </option>
              <option value="infra_code" <?= ($search_opt === 'infra_code' ? "selected" : "") ?>> Infraction Code </option>
              <option value="infra_detail" <?= ($search_opt === 'infra_detail' ? "selected" : "") ?>> Infraction Detail </option>
          </select>
      </div>
  </div>
  <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 10px;">
      <div class="mb-3">
          <label for="keyword" class="form-label">Keyword</label>
          <input type="text" name="keyword" value="<?php echo e($word_search); ?>" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search ... " />
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

  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('attrib-infra.create')); ?>"> <i class="bx bx-fw bx-book-add"></i>Add Infraction to Attribute</a>
        </div>
      </h4>
    </div><!-- end card header -->
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Attribute</th>
              <th scope="col">Code</th>
              <th scope="col">Detail</th>
              <th scope="col">Added by</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attrib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:10%;"><?php echo e(++$i); ?></td>
              <td style="width:20%;"><?php echo e($attrib->attribute->attribute_name); ?></td>
              <td style="width:20%;"><?php echo e($attrib->infraction->code); ?></td>
              <td style="width:20%;"><?php echo e($attrib->infraction->detail); ?></td>
              <td style="width:30%;"><?php echo e(!empty($attrib->createdby) ? $attrib->createdby->firstname." ".$attrib->createdby->lastname : null); ?></td>
              <td style="width:10%;">
                <a class="btn btn-sm btn-info" href="<?php echo e(route('attrib-infra.show',$attrib->attribute_infraction_id)); ?>" title="View Attribute"><i class="bx bx-fw bx-show bx-xs"></i></a>
                <a class="btn btn-sm btn-primary" href="<?php echo e(route('attrib-infra.edit',$attrib->attribute_infraction_id)); ?>" title="Edit Attribute"><i class="bx bx-fw bx-edit-alt bx-xs"></i></a>
                <a class="btn btn-sm btn-danger" href="<?php echo e(route('attrib-infra.delete',$attrib->attribute_infraction_id)); ?>"><i class="bx bx-fw bx bx-trash"></i></a>
              </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="5" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  </div>
  <div class="d-flex justify-content-center">
    <?php echo e($data->links()); ?>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/attribute-infraction/index.blade.php ENDPATH**/ ?>