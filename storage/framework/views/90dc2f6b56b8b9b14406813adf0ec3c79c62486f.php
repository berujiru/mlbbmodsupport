
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Moderator Score Summary'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Moderator Score Summary <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('score-summary.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xl-12">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">List of Scores</h5>
                </div>
                <div class="card">
                <table class="table table-hover table-nowrap mb-0 align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mod ID</th>
                        <th scope="col">Moderator</th>
                        <th scope="col">Score</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td style="width:5%;"><?php echo e($i++); ?></td>
                        <td style="width:20%;"><?php echo e(!empty($score->MOD_ID) ? $score->MOD_ID : 'Mod ID not found'); ?></td>
                        <td style="width:20%;"><?php echo e(!empty($score->MODERATOR) ? $score->MODERATOR : 'Name not found'); ?></td>
                        <td style="width:20%;"><?php echo e(!empty($score->overall_score) ? $score->overall_score : 'Score not found'); ?></td>
                        <td style="width:20%;"><?php echo e(date("m/d/Y",strtotime($score->score_date))); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
                    <?php endif; ?>
                </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <?php echo e($data->links()); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/score-summary/show.blade.php ENDPATH**/ ?>