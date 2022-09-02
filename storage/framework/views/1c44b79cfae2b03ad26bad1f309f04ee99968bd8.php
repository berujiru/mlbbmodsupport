
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.dashboards'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Dashboards <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Dashboard <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php
$num_ind = 0;
$num_img = 0;
?>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1"><?php echo e($greeting); ?><?php echo e(!empty($dbsc) ? ", ".$dbsc->firstname : ""); ?>!</h4>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        <?php echo e(date("F j, Y h:i:s A")); ?>

                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Registered Accounts</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="<?php echo e(number_format($active_accounts,2)); ?>">0</span></h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                            Total Active</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="users" class="text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!--newly registered -->
                <div class="col-xl-4 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Newly Registered</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="<?php echo e(number_format($total_newly_registered,2)); ?>">0</span></h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                            Total New Active</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="users" class="text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!-- number of teams -->
                <div class="col-xl-4 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Number of Teams</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="<?php echo e(number_format($total_teams,2)); ?>">0</span></h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                            Total Active Teams</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i data-feather="users" class="text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!--
                <div class="col-xl-4 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Male Employees</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="<?php echo e(number_format($total_male,2)); ?>">0</span></h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                            Total Active</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i class="bx bx-male-sign text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                <!--    </div> <!-- end card-->
                <!--</div> <!-- end col-->
                <!--
                <div class="col-xl-4 col-md-6">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Female Employees</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="<?php echo e(number_format($total_female,2)); ?>">0</span></h2>
                                    <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                            Total Active</p>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i class="bx bx-female-sign text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                <!--    </div> <!-- end card-->
            <!--    </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Active Teams</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">Team</th>
                                            <th scope="col">Number of People</th>
                                            <th scope="col">Number of Mentors</th>
                                            <th scope="col">Headed By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list_teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="avatar-sm bg-light rounded p-1 me-2">
                                                        <img src="<?php echo e(URL::asset('assets/images/companies/img-1.png')); ?>"
                                                            alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div class="flex-grow-1"><?php echo e($lt->team_name); ?></div>
                                                </div>
                                            </td>
                                            <td><span class="text-success"><?php echo e($lt->number_people); ?></span></td>
                                            <td><span class="text-danger">no data yet</span></td>
                                            <td><?= empty($lt->headed_by) ? "<span class='text-danger'>no data yet</span>" : "<span class='text-primary'>$lt->headed_by</span>" ?></td>
                                        </tr><!-- end tr -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
                                        <?php endif; ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Today's Birthday</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
                                    <?php if(count($today_birthdays) > 0 && count($birthday_cards) > 0): ?>
                                    <div class="carousel-indicators">
                                        <?php if(count($birthday_cards) > 1): ?>
                                            <?php $__currentLoopData = $birthday_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($num_ind == 0): ?>
                                            <button type="button" class="active" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo e($num_ind); ?>" aria-current="true" aria-label="<?php echo e($tb->mod_id); ?>"></button>
                                            <?php else: ?>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo e($num_ind); ?>" aria-current="true" aria-label="<?php echo e($tb->mod_id); ?>"></button>
                                            <?php 
                                                endif;
                                                $num_ind++;
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="carousel-inner" role="listbox" style="width:100%;max-height: 400px !important;">
                                    <?php
                                        foreach($birthday_cards as $bpic):    
                                            if($num_img == 0): ?>
                                            <div class="carousel-item active" data-interval="2000">
                                                <img src="<?php echo e(URL::asset('img_birthday/'.$bpic->pic_filename)); ?>" class="d-block w-100 img-fluid mx-auto" alt="<?php echo e($bpic->mod_id); ?>">
                                            </div>
                                            <?php else: ?>
                                            <div class="carousel-item" data-interval="2000">
                                                <img src="<?php echo e(URL::asset('img_birthday/'.$bpic->pic_filename)); ?>" class="d-block w-100 img-fluid mx-auto" alt="<?php echo e($bpic->mod_id); ?>">
                                            </div>
                                            <?php
                                            endif;
                                            $num_img++;
                                            ?>
                                    <?php endforeach; ?>
                                    </div>
                                    <?php if(count($birthday_cards) > 1): ?>
                                        <button class="carousel-control-prev" type="button" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <!--  no display -->
                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $today_birthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="avatar-sm bg-light rounded p-1 me-2">
                                                                <img src="<?php echo e(URL::asset('images/' . Auth::user()->avatar)); ?>"
                                                                    alt="" class="img-fluid d-block" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1"><?php echo e($tb->firstname." ".$tb->lastname); ?></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal"><?php echo e(date("F j",strtotime($tb->birthday))); ?></h5>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr><td colspan="3" class="text-muted">No birthday celebrant today</td></tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->
        <!--</div> <!-- end .h-100-->

    </div> <!-- end col -->


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('/assets/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8\htdocs\mlbbmodsupport\resources\views/index.blade.php ENDPATH**/ ?>