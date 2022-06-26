
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Infractions'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Infractions <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!-- <div class="pull-left">
            <h4> View Infraction <em><?php echo e($infraction->code); ?></em></h4>
        </div> -->
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('infraction.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Infraction <b><em><?php echo e($infraction->code); ?></em></b></h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Code :</td>
                                    <td class="text-end"><?php echo e($infraction->code); ?></td>
                                </tr>
                                <tr>
                                    <td>Detail : </td>
                                    <td class="text-end"><?php echo e($infraction->detail); ?></td>
                                </tr>
                                <tr>
                                    <td>Created By :</td>
                                    <td class="text-end"><?php echo e(!empty($infraction->createdby) ? $infraction->createdby->firstname." ".$infraction->createdby->lastname : null); ?></td>
                                </tr>
                                <tr>
                                    <td>Date Created : </td>
                                    <td class="text-end"><?php echo e(!empty($infraction->created_at) ? date("F j, Y h:i:s A", strtotime($infraction->created_at)) : null); ?></td>
                                </tr>
                                <?php if(!empty($infraction->updated_by)): ?>
                                <tr>
                                    <td>Updated By :</td>
                                    <td class="text-end"><?php echo e(!empty($infraction->updatedby) ? $infraction->updatedby->firstname." ".$infraction->updatedby->lastname : null); ?></td>
                                </tr>
                                <tr>
                                    <td>Date Updated : </td>
                                    <td class="text-end"><?php echo e(!empty($infraction->updated_at) ? date("F j, Y h:i:s A", strtotime($infraction->updated_at)) : null); ?></td>
                                </tr>
                                <?php endif; ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/infraction/show.blade.php ENDPATH**/ ?>