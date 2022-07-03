
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Teams'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Teams <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('team.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Team <b><em><?php echo e($team->team_code); ?></em></b></h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Code :</td>
                                    <td class="text-end"><?php echo e($team->team_code); ?></td>
                                </tr>
                                <tr>
                                    <td>Name : </td>
                                    <td class="text-end"><?php echo e($team->team_name); ?></td>
                                </tr>
                                <tr>
                                    <td>Created By :</td>
                                    <td class="text-end"><?php echo e(!empty($team->createdby) ? $team->createdby->firstname." ".$team->createdby->lastname : null); ?></td>
                                </tr>
                                <tr>
                                    <td>Date Created : </td>
                                    <td class="text-end"><?php echo e(!empty($team->created_at) ? date("F j, Y h:i:s A", strtotime($team->created_at)) : null); ?></td>
                                </tr>
                                <?php if(!empty($team->updated_by)): ?>
                                <tr>
                                    <td>Updated By :</td>
                                    <td class="text-end"><?php echo e(!empty($team->updatedby) ? $team->updatedby->firstname." ".$team->updatedby->lastname : null); ?></td>
                                </tr>
                                <tr>
                                    <td>Date Updated : </td>
                                    <td class="text-end"><?php echo e(!empty($team->updated_at) ? date("F j, Y h:i:s A", strtotime($team->updated_at)) : null); ?></td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/team/show.blade.php ENDPATH**/ ?>