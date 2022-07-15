
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Team Deputy Historical Change'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Team Deputy Historical Change <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('team-deputy-history.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Team Deputy History</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Team :</td>
                                    <td class="text-end"><?php echo e(!empty($deputy->team) ? $deputy->team->team_name : 'Team not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Previous Assigned Deputy : </td>
                                    <td class="text-end"><?php echo e(!empty($deputy->profile) ? $deputy->profile->firstname." ".$deputy->profile->lastname : 'No deputy profile'); ?></td>
                                </tr>
                                <tr>
                                    <td>Date Changed : </td>
                                    <td class="text-end"><?php echo e(!empty($deputy->date_changed) ? date("m/d/Y h:i:s A",strtotime($deputy->date_changed)) : null); ?></td>
                                </tr>
                                <tr>
                                    <td>Changed by :</td>
                                    <td class="text-end"><?php echo e(!empty($deputy->createdby) ? $deputy->createdby->firstname." ".$deputy->createdby->lastname : null); ?></td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/team-deputy-history/show.blade.php ENDPATH**/ ?>