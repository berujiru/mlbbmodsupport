
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Deputy Moderator Score'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Deputy Moderator Score <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('deputy-mods.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Details</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Team :</td>
                                    <td class="text-end"><?php echo e(!empty($score->modprofile->deputyteam->team) ? $score->modprofile->deputyteam->team->team_name : 'Team not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Deputy : </td>
                                    <td class="text-end"><?php echo e(!empty($score->modprofile->deputyteam) ? $score->modprofile->deputyteam->profile->firstname." ".$score->modprofile->deputyteam->profile->lastname : 'No deputy profile'); ?></td>
                                </tr>
                                <tr>
                                    <td>Mod ID : </td>
                                    <td class="text-end"><?php echo e(!empty($score->modid) ? $score->modid : 'Mod ID not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Moderator : </td>
                                    <td class="text-end"><?php echo e(!empty($score->moderator) ? $score->moderator : 'Name not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Score : </td>
                                    <td class="text-end"><?php echo e(!empty($score->score) ? number_format($score->score,2).' %' : 'Score not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Details : </td>
                                    <td class="text-end"><?php echo e(!empty($score->details) ? $score->details : ''); ?></td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/deputy-mods/show.blade.php ENDPATH**/ ?>