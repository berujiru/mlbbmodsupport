
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Birthday Card'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Birthday Card <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('birthday-card.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>

<div class="col-xl-6">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Birthday Card</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-end" width="25%">Moderator ID :</td>
                                    <td class="text-first"><?php echo e($bdpic->mod_id); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Name : </td>
                                    <td class="text-first"><?php echo e(!empty($bdpic->profile) ? $bdpic->profile->firstname." ".$bdpic->profile->lastname : 'No profile found'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Birth Date : </td>
                                    <td class="text-first"><?php echo e(!empty($bdpic->profile->birthday) ? date("F j, Y", strtotime($bdpic->profile->birthday)) : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Birthday Card :</td>
                                    <td class="text-first"><img src="<?php echo e(URL::asset('img_birthday/'.$bdpic->pic_filename)); ?>" class="d-block w-100 img-fluid mx-auto" alt="..."></td>
                                </tr>
                                <?php if(!empty($bdpic->re_attached_by)): ?>
                                <tr>
                                    <td class="text-end" width="25%">Re-uploaded By :</td>
                                    <td class="text-first"><?php echo e(!empty($bdpic->reattachedby) ? $bdpic->reattachedby->firstname." ".$bdpic->reattachedby->lastname : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Date Attached : </td>
                                    <td class="text-first"><?php echo e(!empty($bdpic->date_reattached) ? date("F j, Y h:i:s A", strtotime($bdpic->date_reattached)) : null); ?></td>
                                </tr>
                                <?php else: ?>
                                <tr>
                                    <td class="text-end" width="25%">Uploaded By :</td>
                                    <td class="text-first"><?php echo e(!empty($bdpic->attachedby) ? $bdpic->attachedby->firstname." ".$bdpic->attachedby->lastname : null); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end" width="25%">Date Uploaded : </td>
                                    <td class="text-first"><?php echo e(!empty($bdpic->date_attached) ? date("F j, Y h:i:s A", strtotime($bdpic->date_attached)) : null); ?></td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/birthday-picture/show.blade.php ENDPATH**/ ?>