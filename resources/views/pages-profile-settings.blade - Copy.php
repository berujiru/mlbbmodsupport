@extends('layouts.master')
@section('title') @lang('translation.settings') @endsection
@section('content')
<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="{{ URL::asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
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
                        <img src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif"
                            class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                            alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <input id="profile-img-file-input" type="file"
                                class="profile-img-file-input">
                            <label for="profile-img-file-input"
                                class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                    <h5 class="fs-16 mb-1">{{Auth::user()->name}}</h5>
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
                        style="width: @if ($dbsc){{ 100 }}@else{{ 10 }}@endif%" aria-valuenow="@if ($dbsc){{ 100 }}@else{{ 10 }}@endif" aria-valuemin="0"
                        aria-valuemax="100">
                        <div class="label">@if ($dbsc){{ "100%" }}@else{{ "10%" }}@endif</div>
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
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        <form action="{{route('profile.update',0)}} needs-validation novalidate">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">First
                                            Name</label>
                                        <input type="text" name="firstname" class="form-control" id="firstnameInput"
                                            placeholder="Enter your firstname" value="">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Last
                                            Name</label>
                                        <input type="text" name="lastname" class="form-control" id="lastnameInput"
                                            placeholder="Enter your lastname">
                                    </div>
                                </div>
                                 <!--end col-->
                                 <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="mnameInput" class="form-label">Middle Initial</label>
                                        <input type="text" name="middlename" class="form-control" id="mnameInput"
                                            placeholder="Enter your lastname" >
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="modidinput" class="form-label">MOD ID</label>
                                        <input type="number" name="modid" class="form-control"
                                            placeholder="mod id number" id="modidinput">
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-2">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="ageinput" class="form-label">Age</label>
                                        <input type="number" name="age" class="form-control"
                                            placeholder="age" id="ageinput">
                                    </div>
                                </div><!-- end col -->
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="sexinput" class="form-label">Sex</label>
                                        <select class="form-control" name="sex" data-choices
                                            data-choices-text-unique-true id="sexinput">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="bdayinput" class="form-label">Birthday
                                        </label>
                                        <input type="text" name="birthday" class="form-control" data-provider="flatpickr" id="bdayinput"
                                        data-date-format="Y-m-d">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="locationinput" class="form-label">Location
                                        </label>
                                        <input type="text" name="location" class="form-control" id="locationinput"
                                            placeholder="Enter your location">
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="contactinpot" class="form-label">Phone</label>
                                        <input type="number" name="contactno" class="form-control" id="contactinpot"
                                            placeholder="(xxx)xx-xxxx-xxx">
                                    </div>
                                </div><!-- end col -->
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="emailinput" class="form-label">Email
                                            Address</label>
                                        <input type="email" name ="email" class="form-control" id="emailinput"
                                            placeholder="Enter your email">
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
                                        <input type="text" name="fblink" class="form-control" id="fbinput"
                                            placeholder="www.facbook.com/sample" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">Team</label>
                                        <select class="form-control" name="team" data-choices
                                            data-choices-text-unique-true multiple id="teamuInput">
                                            <option value="Community Manage">Community</option>
                                            <option value="MIL">MIL</option>
                                        </select>
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
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="igninput" class="form-label">In-game Name</label>
                                        <input type="text" name="igname" class="form-control" id="igninput"
                                            placeholder="Enter IGN" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="igserverinput" class="form-label">In-game Server</label>
                                        <input type="number" class="form-control" name="igserver" id="igserverinput"
                                            placeholder="Enter Server ID" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="ignidinput" class="form-label">In-game ID</label>
                                        <input type="number" class="form-control" name="ignid" id="ignidinput"
                                            placeholder="Enter ML ID" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="descriptioninput"
                                            class="form-label">Description</label>
                                        <textarea class="form-control"
                                            id="descriptioninput"
                                            name="description"
                                            placeholder="Enter your description"
                                            rows="3">Hi! I am ...</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary">Updates</button>
                                        <button type="button"
                                            class="btn btn-soft-success">Cancel</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
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
@endsection
@section('script')


    <script src="{{ URL::asset('assets/libs/cleave.js/cleave.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-masks.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
