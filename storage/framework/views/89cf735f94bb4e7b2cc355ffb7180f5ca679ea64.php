
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
<?php
// echo "<pre>";
// print_r($markdown);
// echo "</pre>";
?>
<div class="row">
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
                                    <td class="text-end"><?php echo e(!empty($score->MOD_ID) ? $score->MOD_ID : 'Mod ID not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Moderator : </td>
                                    <td class="text-end"><?php echo e(!empty($score->Moderator) ? $score->Moderator : 'Name not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Score : </td>
                                    <td class="text-end"><?php echo e(!empty($score->OVERALLSCORE) ? $score->OVERALLSCORE : 'Score not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Date : </td>
                                    <td class="text-end"><?php echo e(!empty($score->Date) ? date("m/d/Y",strtotime($score->Date)) : ''); ?></td>
                                </tr>
                                <?php if(!empty($markdown[0]->Form_Attribute)): ?>
                                <tr>
                                    <td>Markdown Details : </td>
                                    <td class="text-first text-danger"><?php echo e(!empty($markdown[0]->Form_Attribute) ? $markdown[0]->Form_Attribute : ''); ?></td>
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
    <?php //if(!empty($score->score) && $score->score < 100): ?>
    <!-- <div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">Reply</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Details :</td>
                                    <td class="text-end">None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    -->
    </div>
    <?php //endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/deputy-mods/show.blade.php ENDPATH**/ ?>