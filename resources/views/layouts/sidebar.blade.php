<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="50">
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
                <li class="menu-title"><span >@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('root') }}">
                        <i class="ri-honour-line"></i> <span data-key="t-landing">Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->hasRole('Admin'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bxs-dashboard"></i> <span >Admin Modules</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link" >Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link" >Roles</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                @endif
                <li class="nav-item"> <!-- start Infractions -->
                    <a class="nav-link" aria-expanded="false" href="{{ route('infraction.index') }}">
                        <i class="bx bx-message-alt-error"></i> <span >Infraction</span>
                    </a>
                </li> <!-- end Infractions -->
                <li class="nav-item">
                    <a href="apps-mailbox" class="nav-link" >
                    <i class="ri-mail-line"></i> <span data-key="t-landing">@lang('translation.mailbox')</a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
