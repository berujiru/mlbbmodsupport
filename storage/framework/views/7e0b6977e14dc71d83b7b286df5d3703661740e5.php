
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.mailbox'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mt-n4 mx-n4 mb-n5">
            <div class="bg-soft-warning">
                <div class="card-body pb-4 mb-5">
                    <div class="row">
                        <div class="col-md">
                            <div class="row align-items-center">
                                <div class="col-md-auto">
                                    <div class="avatar-md mb-md-0 mb-4">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <img src="<?php echo e(URL::asset('assets/images/companies/img-4.png')); ?>" alt="" class="avatar-sm" />
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md">
                                    <h4 class="fw-semibold"><?php echo e($mail->uniqueID); ?> Notice to Explain</h4>
                                    <div class="hstack gap-3 flex-wrap">
                                        <div class="text-muted"><i class="ri-building-line align-bottom me-1"></i>
                                            MLBB QA</div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Escalation Date : <span class="fw-medium"><?php echo e($mail->EscalationDate); ?></span></div>
                                        <div class="vr"></div>
                                        <div class="text-muted">Infraction Date : <span class="fw-medium"><?php echo e($mail->InfractionDate); ?></span></div>
                                        <div class="vr"></div>
                                        <div class="badge rounded-pill bg-warning fs-12"><?php echo e($mail->RecommendedAction); ?></div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end col-->

                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!-- end card body -->
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-body p-4">
                <h6 class="fw-semibold text-uppercase mb-3">You have the right to hear and be heard</h6>
                <p class="text-muted">Upon receiving this report, you are given a maximum of <b class="text-warning">forty-eight (48) hours</b> to explain your side of the case.</p>
                <p class="text-muted">Failure to comply waives any and all right to appeal any decision that
                    shall be drafted and enacted upon by the assigned Deputy and assigned
                    Quality Assurance Specialist. Your digital footprint shall serve as your
                    signature.</p>

                <h6 class="fw-semibold text-uppercase mb-3">Case Details</h6>
                <ul class="text-muted vstack gap-2 mb-4">
                    <li>Severity: <b><?php echo e($mail->Severity); ?></b></li>
                    <li>Corrective Action: <b><?php echo e($mail->RecommendedAction); ?></b></li>
                    <li>Listed Infractions: <b><?php echo e($mail->Attribute); ?></b></li>
                </ul>
                <p class="text-muted"><?php echo e($mail->Summary); ?></p>

            </div>
            <!--end card-body-->
            <div class="card-body p-4">
                <h5 class="card-title mb-4">SMART Commitment</h5>
                <?php $__currentLoopData = $mailreply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-simplebar style="height: 100px;" class="px-3 mx-n3">
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <img src="<?php echo e(URL::asset('images/' . Auth::user()->avatar)); ?>" alt="" class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-13"><?php echo e($dbsc->firstname); ?> <?php echo e($dbsc->lastname); ?> <small class="text-muted"><?php echo e($data->created_at); ?></small></h5>
                                <p class="text-muted"><?php echo e($data->content); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo Form::open(array('route' => 'ntestore','method'=>'POST')); ?>

                <div class="row g-3">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-floating">
                            <?php echo Form::hidden('ntecode', $mail->UniqueID, array('placeholder' => 'Code','class' => 'form-control','autocomplete'=>'off','id'=>'teamNamefloatingInput')); ?>

                            <?php echo Form::hidden('nteid', $mail->id, array('placeholder' => 'Code','class' => 'form-control','autocomplete'=>'off','id'=>'teamNamefloatingInput')); ?>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Leave a SMART Commitment</label>
                        <textarea class="form-control bg-light border-light" name="content" id="exampleFormControlTextarea1" rows="5" placeholder="Enter Comments Here"></textarea>
                    </div>
                    <div class="col-lg-12 text-end">
                        <button type="submit" class="btn btn-success"><i class="bx bx-fw bx-save"></i>Leave a SMART Commitment</button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
            <!-- end card body -->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Moderator Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless align-middle mb-0">
                        <tbody>
                            <tr>
                                <td class="fw-medium">Department</td>
                                <td><?php echo e($mail->Team); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">MOD ID</td>
                                <td><?php echo e($dbsc->modid); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Full Name</td>
                                <td><?php echo e($dbsc->firstname); ?> <?php echo e($dbsc->lastname); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Priority</td>
                                <td>
                                    <span class="badge bg-danger">High</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Escalation Date</td>
                                <td><?php echo e($mail->EscalationDate); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Infraction Date</td>
                                <td><?php echo e($mail->InfractionDate); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/@ckeditor/@ckeditor.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/apps-nteview.blade.php ENDPATH**/ ?>