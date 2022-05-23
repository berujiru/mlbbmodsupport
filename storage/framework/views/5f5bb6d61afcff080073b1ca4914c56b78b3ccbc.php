
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.settings'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="<?php echo e(URL::asset('assets/images/profile-bg.jpg')); ?>" class="profile-wid-img" alt="">
        <div class="overlay-content">
            <div class="text-end p-3">
                <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                    <input id="profile-foreground-img-file-input" type="file"
                        class="profile-foreground-img-file-input">
                    <label for="profile-foreground-img-file-input"
                        class="profile-photo-edit btn btn-outline-danger waves-effect waves-light">
                        <i class="ri-image-edit-line align-bottom me-1"></i> Cover can't be change right now
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-3">
        <div class="card mt-n5">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="<?php if(Auth::user()->avatar != ''): ?><?php echo e(URL::asset('images/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/avatar-1.jpg')); ?><?php endif; ?>"
                            class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                            alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <label for="profile-img-file-input"
                                class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i> 
                                </span>
                                <span class="badge badge-soft-danger">coming soon</span>
                            </label>
                        </div>
                    </div>
                    <h5 class="fs-16 mb-1"><?php echo e(Auth::user()->name); ?></h5>
                    <p class="text-muted mb-0">Profile</p>
                </div>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-5">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Complete Your Profile</h5>
                    </div>
                </div>
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
    </div>
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                            role="tab">
                            <i class="fas fa-home"></i>
                            DBSC
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        <?php echo Form::model($dbsc, array('route' => ['updateProfile'])); ?>

                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">First
                                            Name</label>
                                        <?php echo Form::text('firstname', null, array('placeholder' => 'Enter your first name','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Last
                                            Name</label>
                                        <?php echo Form::text('lastname', null, array('placeholder' => 'Enter your last name','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                 <!--end col-->
                                 <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="mnameInput" class="form-label">Middle Initial</label>
                                        <?php echo Form::text('middlename', null, array('placeholder' => 'Enter your middle initial','class' => 'form-control','max'=>"1")); ?>

                                        <?php $__errorArgs = ['middlename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="modidinput" class="form-label">MOD ID</label>
                                        <?php echo Form::text('modid', null, array('placeholder' => 'Enter your Mod ID','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['modid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-2">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="ageinput" class="form-label">Age</label>

                                        <?php echo Form::number('age', null, array('placeholder' => 'Enter your Age','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="sexinput" class="form-label">Sex</label>
                                        <?php echo Form::select('sex', array('male' => 'Male', 'female' => 'Female'), 'S',['class'=>'form-control']); ?>

                                        <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="bdayinput" class="form-label">Birthday
                                        </label>
                                        <?php echo e(Form::date('birthday',null,["class"=>"form-control","data-provider"=>"flatpickr"])); ?>  
                                        <?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="locationinput" class="form-label">Location
                                        </label>
                                        <?php echo Form::text('location', null, array('placeholder' => 'Enter your location','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="contactinpot" class="form-label">Phone</label>
                                        <?php echo Form::text('contactno', null, array('placeholder' => '(XXX)XX-XXXX-XXX','class' => 'form-control','id'=>'cleave-phone')); ?>

                                        <?php $__errorArgs = ['contactno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div><!-- end col -->
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="emailinput" class="form-label">Email
                                            Address</label>
                                        <?php echo Form::email('email', null, array('placeholder' => 'Enter your email','class' => 'form-control')); ?>

                                         <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="fbinput" class="form-label">Facebook Link</label>
                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                <i class="ri-facebook-line"></i>
                                            </span>
                                        </div>
                                        <?php echo Form::text('fblink', null, array('placeholder' => 'Enter facebook link','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['fblink'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">Team</label>
                                        <select class="form-control" name="team" data-choices
                                            data-choices-text-unique-true id="teamuInput">
                                            <option value="Community">Community</option>
                                            <option value="MIL">MIL</option>
                                        </select>
                                        <?php $__errorArgs = ['team'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">Designation</label>
                                        <select class="form-control" name="designation" data-choices
                                            data-choices-text-unique-true id="skillsInput">
                                            <option value="Moderator">Moderator</option>
                                            <option value="Deputy">Deputy</option>
                                        </select>
                                        <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="igninput" class="form-label">In-game Name</label>
                                        <?php echo Form::text('igname', null, array('placeholder' => 'Enter IGN','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['igname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="igserverinput" class="form-label">In-game Server</label>
                                        <?php echo Form::text('igserver', null, array('placeholder' => 'Enter Server Code','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['igserver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="ignidinput" class="form-label">In-game ID</label>
                                        <?php echo Form::text('ignid', null, array('placeholder' => 'Enter ML ID','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['ignid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="descriptioninput"
                                            class="form-label">Description</label>
                                        <?php echo Form::textarea('description', null, array('placeholder' => 'Enter About or Introduction','class' => 'form-control')); ?>

                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        <!-- </form> -->
                        <?php echo e(Form::close()); ?>

                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="changePassword" role="tabpanel">
                        <form action="javascript:void(0);">
                            <div class="row g-2">
                                <div class="col-lg-4">
                                    <div>
                                        <label for="oldpasswordInput" class="form-label">Old
                                            Password*</label>
                                        <input type="password" class="form-control"
                                            id="oldpasswordInput"
                                            placeholder="Enter current password">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="newpasswordInput" class="form-label">New
                                            Password*</label>
                                        <input type="password" class="form-control"
                                            id="newpasswordInput" placeholder="Enter new password">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <label for="confirmpasswordInput" class="form-label">Confirm
                                            Password*</label>
                                        <input type="password" class="form-control"
                                            id="confirmpasswordInput"
                                            placeholder="Confirm password">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <a href="javascript:void(0);"
                                            class="link-primary text-decoration-underline">Forgot
                                            Password ?</a>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Change
                                            Password</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                        <div class="mt-4 mb-3 border-bottom pb-2">
                            <div class="float-end">
                                <a href="javascript:void(0);" class="link-primary">All Logout</a>
                            </div>
                            <h5 class="card-title">Login History</h5>
                        </div>
                        <button class="btn btn-outline-primary btn-load">
                            <span class="d-flex align-items-center">
                                <span class="spinner-border flex-shrink-0" role="status">
                                    <span class="visually-hidden">Comeback Soon</span>
                                </span>
                                <div class="flex-grow-1 ms-2">
                                    Loading...
                                </span>
                            </span>
                        </button>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


    <script src="<?php echo e(URL::asset('assets/libs/cleave.js/cleave.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/form-masks.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/profile-setting.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8\htdocs\mlbbmodsupport\resources\views/pages-profile-settings.blade.php ENDPATH**/ ?>