
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Deputy Moderator NTE'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Deputy Moderator NTE <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('deputy-mods-nte.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>
<?php
// echo "<pre>";
// print_r($nte);
// echo "</pre>";
?>
<div class="row">
    <div class="col-xl-6">
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
                                    <td style="width: 25%;">Team :</td>
                                    <!-- <td class="text-end"><?php //!empty($nte->profile->deputyteam->team) ? $nte->profile->deputyteam->team->team_name : 'Team not found' ?></td> -->
                                    <td class="text-end"><?php echo e(!empty($nte->Team) ? $nte->Team : 'Team not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Deputy : </td>
                                    <td class="text-end"><?php echo e(!empty($nte->profile->deputyteam) ? $nte->profile->deputyteam->profile->firstname." ".$nte->profile->deputyteam->profile->lastname : 'No deputy profile'); ?></td>
                                </tr>
                                <tr>
                                    <td>Mod ID : </td>
                                    <td class="text-end"><?php echo e(!empty($nte->MODID) ? $nte->MODID : 'Mod ID not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Moderator : </td>
                                    <td class="text-end"><?php echo e(!empty($nte->Moderator) ? $nte->Moderator : 'Name not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Infraction Date : </td>
                                    <td class="text-end"><?php echo e(!empty($nte->InfractionDate) ? $nte->InfractionDate : 'Data not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Escalation Date : </td>
                                    <td class="text-end"><?php echo e(!empty($nte->EscalationDate) ? $nte->EscalationDate : 'Data not found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Severity : </td>
                                    <td class="text-end"><?php echo e(!empty($nte->Severity) ? $nte->Severity : ''); ?></td>
                                </tr>
                                <tr>
                                    <td>Attribute : </td>
                                    <td class="text-first text-danger" style="text-align: justify;"><?php echo e(!empty($nte->Attribute) ? $nte->Attribute : ''); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 32%;">Recommended Action : </td>
                                    <td class="text-end"><?php echo e(!empty($nte->RecommendedAction) ? $nte->RecommendedAction : ''); ?></td>
                                </tr>
                                <tr>
                                    <td>Summary Details : </td>
                                    <td class="text-first" style="text-align: justify;"><?php echo e(!empty($nte->Summary) ? $nte->Summary : ''); ?></td>
                                </tr>
                                <tr>
                                    <td>Instance : </td>
                                    <td class="text-end" style="text-align: justify;"><?php echo e(!empty($nte->Instance) ? $nte->Instance : ''); ?></td>
                                </tr>
                                <tr>
                                    <td>SD % : </td>
                                    <td class="text-end" style="text-align: justify;"><?php echo e(!empty($nte->SD) ? $nte->SD : ''); ?></td>
                                </tr>
                                <tr>
                                    <td>Date &amp; Time Seen : </td>
                                    <td class="text-end" style="text-align: justify;"><?php echo e(!empty($nte->nteseen) ? date('m/d/Y h:i:s A',strtotime($nte->nteseen->date_seen)) : 'Not yet viewed'); ?></td>
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
    <?php if(count($ntereply) > 0): ?>
    <div class="col-xl-4">
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
                                    <td style="width: 25%;">NTE Code :</td>
                                    <td class="text-first" style="text-align: justify; font-weight:bold;"><?php echo e(!empty($ntereply[0]->ntecode) ? $ntereply[0]->ntecode : 'Not yet viewed'); ?></td>
                                </tr>
                                <tr>
                                    <td>Content :</td>
                                    <td class="text-first" style="text-align: justify;"><?php echo e(!empty($ntereply[0]->content) ? $ntereply[0]->content : 'Not yet viewed'); ?></td>
                                </tr>
                                <tr>
                                    <td>Date :</td>
                                    <td class="text-first" style="text-align: justify;"><?php echo e(!empty($ntereply[0]->created_at) ? date("m/d/Y",strtotime($ntereply[0]->created_at)) : 'Not yet viewed'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/deputy-mods-nte/show.blade.php ENDPATH**/ ?>