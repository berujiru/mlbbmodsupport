<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.profile'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg">
        <img src="<?php echo e(URL::asset('assets/images/profile-bg.jpg')); ?>" alt="" class="profile-wid-img" />
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="<?php if(Auth::user()->avatar != ''): ?><?php echo e(URL::asset('images/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/avatar-1.jpg')); ?><?php endif; ?>" alt="user-img"
                    class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1"><?php echo e(Auth::user()->name); ?></h3>
                <p class="text-white-75"><?php echo e(Auth::user()->email); ?></p>
                <div class="hstack text-white-50 gap-1">
                    <div class="me-2"><i
                            class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i><?php if($dbsc): ?><?php echo e($dbsc->location); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></div>
                    <div><i
                            class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>MIL Moderator
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div>
            <div class="d-flex">
                <!-- Nav tabs -->
                <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                            role="tab">
                            <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                class="d-none d-md-inline-block">Overview</span>
                        </a>
                    </li>
                </ul>
                <div class="flex-shrink-0">
                    <a href="<?php echo e(route('editProfile')); ?>" class="btn btn-soft-success waves-effect waves-light"><i
                            class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-4 text-muted">
                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-5">Complete Your Profile</h5>
                                    <div
                                        class="progress animated-progress custom-progress progress-label">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width: <?php if($dbsc): ?><?php echo e(100); ?><?php else: ?><?php echo e(10); ?><?php endif; ?>%" aria-valuenow="<?php if($dbsc): ?><?php echo e(100); ?><?php else: ?><?php echo e(10); ?><?php endif; ?>" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <div class="label"><?php if($dbsc): ?><?php echo e("100%"); ?><?php else: ?><?php echo e("10%"); ?><?php endif; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Info</h5>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                    <td class="text-muted"><?php if($dbsc): ?><?php echo e($dbsc->firstname." ".$dbsc->middlename.". ".$dbsc->lastname); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Contact No. :</th>
                                                    <td class="text-muted"><?php if($dbsc): ?><?php echo e($dbsc->contactno); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                    <td class="text-muted"><?php if($dbsc): ?><?php echo e($dbsc->email); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Location :</th>
                                                    <td class="text-muted"><?php if($dbsc): ?><?php echo e($dbsc->location); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">FB Link</th>
                                                    <td class="text-muted"><?php if($dbsc): ?><?php echo e($dbsc->fblink); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->

                        </div>
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">About</h5>
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="d-flex mt-3">
                                                <div class="flex-grow-1 ">
                                                    <p class="mb-1"><?php if($dbsc): ?><?php echo e($dbsc->description); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div
                                                    class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-price-tag-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">In-Game Name :</p>
                                                    <a href="#"
                                                        class="fw-semibold"><?php if($dbsc): ?><?php echo e($dbsc->igname); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div
                                                    class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-server-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">In-Game Server :</p>
                                                    <a href="#"
                                                        class="fw-semibold"><?php if($dbsc): ?><?php echo e($dbsc->igserver); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div
                                                    class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-hashtag"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">In-Game ID :</p>
                                                    <a href="#"
                                                        class="fw-semibold"><?php if($dbsc): ?><?php echo e($dbsc->ignid); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div
                                                    class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-user-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Designation :</p>
                                                    <h6 class="text-truncate mb-0"><?php if($dbsc): ?><?php echo e($dbsc->designation); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div
                                                    class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                    <div
                                                        class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                        <i class="ri-global-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Website :</p>
                                                    <a href="#"
                                                        class="fw-semibold">mlbbmodsupport.com</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!-- end card -->



                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/swiper/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/profile.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mlbbmodsupport\resources\views/pages-profile.blade.php ENDPATH**/ ?>