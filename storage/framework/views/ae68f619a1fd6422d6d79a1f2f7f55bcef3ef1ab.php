<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span ><?php echo app('translator')->get('translation.menu'); ?></span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('root')); ?>">
                        <i class="ri-honour-line"></i> <span data-key="t-landing">Dashboard</span>
                    </a>
                </li>
                <?php if(Auth::user()->hasRole('Admin')): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bxs-dashboard"></i> <span >Admin Modules</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('users.index')); ?>" class="nav-link" >Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('roles.index')); ?>" class="nav-link" >Roles</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item"> <!-- start Infractions -->
                    <a class="nav-link" aria-expanded="false" href="<?php echo e(route('infraction.index')); ?>">
                        <i class="bx bx-message-alt-error"></i> <span >Infraction</span>
                    </a>
                </li> <!-- end Infractions -->
                <li class="nav-item"> <!-- start Team -->
                    <a class="nav-link menu-link" href="#sidebarTeam" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTeam">
                        <i class="bx bxs-user-account"></i> <span >Team Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTeam">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('team.index')); ?>" class="nav-link" >Teams</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('team-deputy.index')); ?>" class="nav-link" >Deputy</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('team-deputy-history.index')); ?>" class="nav-link" >Deputy Historical Changes</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Team -->
                <li class="nav-item"> <!-- start Deputy Mods -->
                    <a class="nav-link" aria-expanded="false" href="<?php echo e(route('deputy-mods.index')); ?>">
                        <i class="bx bxs-user-account"></i> <span >Mod Scores</span>
                    </a>
                </li> <!-- end Deputy Mods -->
                <li class="nav-item"> <!-- start Deputy Mods NTE -->
                    <a class="nav-link" aria-expanded="false" href="<?php echo e(route('deputy-mods-nte.index')); ?>">
                        <i class="bx bxs-user-account"></i> <span >Mod NTEs</span>
                    </a>
                </li> <!-- end Deputy Mods NTE -->
                <li class="nav-item">
                    <a href="<?php echo e(route('birthday-card.index')); ?>" class="nav-link" >
                    <i class="bx bx-images"></i> <span data-key="t-eval">Birthday Card</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('modeval')); ?>" class="nav-link" >
                    <i class="ri-file-user-line"></i> <span data-key="t-eval">Evaluation form</a>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->hasRole('NTE monitor')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('ntereply.index')); ?>" class="nav-link" >
                    <i class="bx bx-note"></i> <span data-key="t-eval">NTE  Replies</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('mailbox')); ?>" class="nav-link" >
                    <i class="ri-mail-line"></i> <span data-key="t-landing"><?php echo app('translator')->get('translation.mailbox'); ?></a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH C:\xampp\htdocs\mlbbmodsupport\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>