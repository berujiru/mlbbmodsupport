
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('NTE REPLY'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> NTE REPLY <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('ntereply.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-6">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View NTE CODE <b style="color: #990000;"><em><?php echo e($netreply->ntecode); ?></em></b></h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-end" width="25%">MOD ID : </td>
                                    <td class="text-first"><?php echo e(!empty($netreply->nte) ? $netreply->nte->MODID : 'Mod ID not found'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end">Moderator Name : </td>
                                    <td class="text-first"><?php echo e(!empty($netreply->nte->profile) ? $netreply->nte->profile->firstname." ".$netreply->nte->profile->lastname : 'No profile found of '.$reply->nte->mod_id); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end">Content : </td>
                                    <td class="text-first" style="text-align: justify;"><?php echo e($netreply->content); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end">Date Created : </td>
                                    <td class="text-first"><?php echo e(!empty($netreply->created_at) ? date("F j, Y", strtotime($netreply->created_at)) : null); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
        <!-- end stickey -->

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/nte-reply-show.blade.php ENDPATH**/ ?>