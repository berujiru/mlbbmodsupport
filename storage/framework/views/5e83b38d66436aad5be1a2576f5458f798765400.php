
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('NTE Replies'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> NTE Replies <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> NTE Replies <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<?php
    $nte_code_search = isset($_GET['nte_code']) ? $_GET['nte_code'] : '';
    $mod_id_selected = isset($_GET['mod_id']) ? $_GET['mod_id'] : '';
?>

<h2>NTE REPLIES</h2>

<?php echo Form::open(array('route' => 'ntereply.index','method'=>'GET')); ?>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="mb-3">
            <label for="moderator" class="form-label">Moderator</label>
            <select class="form-control" name="mod_id" data-choices
                 id="modInput">
                <option value="" selected disabled hidden>Select moderator </option>
                <option value=""> -none- </option>
                <?php $__currentLoopData = $mods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moderator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($moderator->modid); ?>" <?= ($mod_id_selected == $moderator->modid ? "selected" : "") ?> ><?php echo e($moderator->modid.'- '.$moderator->firstname.' '.$moderator->lastname); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['mod_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="mb-3">
            <label for="nte_code" class="form-label">NTE Code</label>
            <input type="text" name="nte_code" value="<?php echo e($nte_code_search); ?>" autocomplete="off" autocapitalize="true" class="form-control" placeholder="Search NTE Code" />
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3" style="margin-top:6px;">
        <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-info"><i class="bx bx-search-alt-2 bx-fw"></i> Search</button>
        </div>
    </div>
    <div class="card">
    <div class="table-responsive">
    <table class="table table-hover table-nowrap mb-0 align-middle">
      <thead>
          <tr>
              <th scope="col" style="width: 10%;">#</th>
              <th scope="col" style="width: 15%;">Date</th>
              <th scope="col" style="width: 20%;">NTE Code</th>
              <th scope="col" style="width: 30%;">Content</th>
              <th scope="col" style="width: 15%;">Moderator</th>
              <th scope="col" style="width: 10%;">Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
              <td style="width:10%;"><?php echo e(++$i); ?></td>
              <td style="width: 15%;"><?php echo e(date("M-d-Y",strtotime($reply->InfractionDate))); ?></td>
              <td style="width: 20%;"><?php echo e($reply->UniqueID); ?></td>
              <td class="text-first" style="width: 30%;"><?php echo e(!empty($reply->content) ? substr($reply->content,0,50).' ...' : ''); ?></td>
              <td style="width: 15%;"><?php echo e(!empty($reply->MODID) ? $reply->MODID." - ".$reply->profile?->firstname." ".$reply->profile?->lastname : 'No MOD ID'); ?></td>
              <!-- <td><?php echo e(!empty($reply->content) && !empty($reply->netreply) ? '<a class="btn btn-sm btn-info" href="route(\'ntereply.show\',$reply->id)" title="View Reply"><i class="bx bx-fw bx-show"></i></a>' : '-None yet so far-'); ?>

              </td> -->
              <td style="width: 10%;">
                <?php if($reply->content): ?>
                    <a class="btn btn-sm btn-info" href="<?php echo e(route('ntereply.show',$reply->replyid)); ?>" title="View Reply"><i class="bx bx-fw bx-show"></i></a>
                <?php else: ?>
                    -None yet so far-
                <?php endif; ?>
              </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr><td colspan="6" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    </div>
    </div>
    <div class="d-flex justify-content-center">
        <?php echo e($data->links()); ?>

    </div>
</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/nte-reply.blade.php ENDPATH**/ ?>