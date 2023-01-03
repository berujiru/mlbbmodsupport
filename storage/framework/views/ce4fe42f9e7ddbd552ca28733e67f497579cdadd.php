
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.profile'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg">
            <img src="<?php echo e(URL::asset('assets/images/moderator.png')); ?>" alt="" class="profile-wid-img" />
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="<?php if($user?->avatar != ''): ?><?php echo e(URL::asset('images/' . $user->avatar )); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/avatar-1.jpg')); ?><?php endif; ?>" alt="user-img"
                    class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1"><?php if($dbsc): ?><?php echo e($dbsc->firstname." ".$dbsc->lastname); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?>  </h3>
                <p class="text-white-75"><?php echo e("-Email Hidden-"); ?></p>
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
        <div class="col-xl-12">
            <div class="card crm-widget">
                <div class="card-body p-0">
                    <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                        <div class="col">
                            <div class="py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Performance (last 10 weeks) <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-space-ship-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value" data-target="<?php echo e($average); ?>"></span>%</h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-md-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Performance (last week)<i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-empathize-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value" data-target="<?php echo e((int)$data[0]->OVERALLSCORE); ?>">0</span>% </h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-md-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">NTE Issued<i class="ri-arrow-down-circle-line text-danger fs-18 float-end align-middle"></i></h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-mail-lock-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value" data-target="<?php echo e(count($data_nte)); ?>">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">ZTP Issued <i class="ri-arrow-down-circle-line text-danger fs-18 float-end align-middle"></i></h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-vip-diamond-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value" data-target="<?php echo e(0); ?>">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        <div class="col">
                            <div class="mt-3 mt-lg-0 py-4 px-3">
                                <h5 class="text-muted text-uppercase fs-13">Overall (weeks) <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ri-service-line display-6 text-muted"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0"><span class="counter-value" data-target="<?php echo e($tenureship); ?>">0</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
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
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-4 text-muted">
                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-xxl-3">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Info</h5>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row"> Mod ID :</th>
                                                    <td class="text-muted"><b> <?php if($dbsc): ?><?php echo e($dbsc->modid); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?> </b> <br/>
                                                    <i>Mod ID not accurate?</i> <button type="button" class="btn btn-danger btn-sm" id="ajax-alert">Request Support</button>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                    <td class="text-muted"><?php if($dbsc): ?><?php echo e($dbsc->firstname." ".$dbsc->middlename.". ".$dbsc->lastname); ?><?php else: ?><?php echo e("None"); ?><?php endif; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Contact No. :</th>
                                                    <td class="text-muted">Hidden</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                    <td class="text-muted">Hidden</td>
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
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">NTEs Issued</h5>
                                    <div class="row">
                                        
                                        <div class="col-12 col-md-12">
                                            <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                                                <ul class="message-list">

                                                <?php $__currentLoopData = $data_nte; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="col-mail col-mail-1">
                                                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15 active">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                            <a href="#" class="title"><?php echo e($nte->Attribute); ?></a>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <a href="#" class="subject">
                                                                    <span class="bg-success badge me-2"><?php echo e($nte->RecommendedAction); ?></span>
                                                                    Hello - <span class="teaser"><?php echo e($nte->Attribute); ?></span>

                                                            
                                                            
                                                            </a>
                                                            <div class="date"><?php echo e($nte->InfractionDate); ?></div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
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

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Last 10 Weeks Performance</h5>
                                    <div class="row">
                                        
                                        <div class="col-12 col-md-12">
                                            <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                                                <ul class="message-list">

                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="col-mail col-mail-1">
                                                            <div class="form-check checkbox-wrapper-mail fs-14">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheck20">
                                                                <label class="form-check-label" for="flexCheck20"></label>
                                                            </div>
                                                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15 active">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                            <a href="#" class="title">MLBB MIL-QA</a>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <a href="#" class="subject">
                                                                <?php if($mail->OVERALLSCORE=="100.00%"): ?>
                                                                    <span class="bg-success badge me-2">Perfect</span>
                                                                    Hello - <span class="teaser">Keep up the good work!</span>
                                                                <?php else: ?>
                                                                    <span class="bg-warning badge me-2">Infractions</span>
                                                                    Hello - <span class="teaser">Needs Improvement from the following:</span>
                                                                <?php endif; ?>
                                                            
                                                            
                                                            </a>
                                                            <div class="date"><?php echo e($mail->Date); ?></div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    

                                                </ul>
                                            </div>
                                        </div>
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

        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/swiper/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/profile.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <!-- <script src="<?php echo e(URL::asset('/assets/js/pages/sweetalerts.init.js')); ?>"></script> -->
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>


    <script>
          document.getElementById("ajax-alert").addEventListener("click", function () {
            Swal.fire({
            title: 'Submit request for MOD ID change',
            input: 'text',
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            confirmButtonClass: 'btn btn-primary w-xs me-2',
            cancelButtonClass: 'btn btn-danger w-xs',
            buttonsStyling: false,
            showCloseButton: true,
            preConfirm: function preConfirm(email) {
                return new Promise(function (resolve, reject) {
                setTimeout(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                    type:'POST',
                    url:"/ticket",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        info: email,
                        user: "<?php echo e(auth()->user()->id); ?>"
                    },
                    success:function(data){
                        resolve();
                    }
                });
                }, 2000)
            })
            },
            allowOutsideClick: true
            }).then(function (email) {
            if (email.value) {
                Swal.fire({
                icon: 'success',
                title: 'Ticket submitted to the developers!',
                confirmButtonClass: 'btn btn-primary w-xs',
                buttonsStyling: false,
                html: 'Submitted ticket: Change for MOD ID note ( <i>' + email.value + ')</i>'
                });
            }
            });
        }); // Custom  Sweatalert
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8\htdocs\mlbbmodsupport\resources\views/pages-profile-visit.blade.php ENDPATH**/ ?>