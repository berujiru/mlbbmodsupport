@extends('layouts.master')
@section('title') @lang('translation.settings') @endsection
@section('content')
<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        @if(Auth::user()->hasRole('Community Manager'))
            <img src="{{ URL::asset('assets/images/manager.png') }}" alt="" class="profile-wid-img" />
        @elseif(Auth::user()->hasRole('Deputy'))
            <img src="{{ URL::asset('assets/images/deputy.png') }}" alt="" class="profile-wid-img" />
        @else
            <img src="{{ URL::asset('assets/images/moderator.png') }}" alt="" class="profile-wid-img" />
        @endif
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
                            <label for="profile-img-file-input"
                                class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i> 
                                </span>
                                <span class="badge badge-soft-danger">coming soon</span>
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
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        {!! Form::model($dbsc, array('route' => ['updateProfile'])) !!}
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">First
                                            Name</label>
                                        {!! Form::text('firstname', null, array('placeholder' => 'Enter your first name','class' => 'form-control')) !!}
                                        @error('firstname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Last
                                            Name</label>
                                        {!! Form::text('lastname', null, array('placeholder' => 'Enter your last name','class' => 'form-control')) !!}
                                        @error('lastname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                 <!--end col-->
                                 <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="mnameInput" class="form-label">Middle Initial</label>
                                        {!! Form::text('middlename', null, array('placeholder' => 'Enter your middle initial','class' => 'form-control','max'=>"1")) !!}
                                        @error('middlename')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="modidinput" class="form-label">MOD ID</label>
                                        {!! Form::text('modid', null, array('placeholder' => 'Enter your Mod ID','class' => 'form-control')) !!}
                                        @error('modid')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-2">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="ageinput" class="form-label">Age</label>

                                        {!! Form::number('age', null, array('placeholder' => 'Enter your Age','class' => 'form-control')) !!}
                                        @error('age')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- end col -->
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <label for="sexinput" class="form-label">Sex</label>
                                        {!! Form::select('sex', array('male' => 'Male', 'female' => 'Female'),$dbsc?$dbsc->sex:'',['class'=>'form-control']) !!}
                                        @error('sex')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="bdayinput" class="form-label">Birthday
                                        </label>
                                        {{ Form::date('birthday',null,["class"=>"form-control","data-provider"=>"flatpickr"]) }}  
                                        @error('birthday')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="locationinput" class="form-label">Location
                                        </label>
                                        {!! Form::text('location', null, array('placeholder' => 'Enter your location','class' => 'form-control')) !!}
                                        @error('location')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="mb-3 mb-xl-0">
                                        <label for="contactinpot" class="form-label">Phone</label>
                                        {!! Form::text('contactno', null, array('placeholder' => '(XXX)XX-XXXX-XXX','class' => 'form-control','id'=>'cleave-phone')) !!}
                                        @error('contactno')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- end col -->
                                <!--end col-->
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="emailinput" class="form-label">Email
                                            Address</label>
                                        {!! Form::email('email', null, array('placeholder' => 'Enter your email','class' => 'form-control')) !!}
                                         @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        {!! Form::text('fblink', null, array('placeholder' => 'Enter facebook link','class' => 'form-control')) !!}
                                        @error('fblink')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">Team</label>
                                        {!! Form::select('team_id', $team,$dbsc?$dbsc->team_id:"",['class'=>'form-control']) !!}
                                        @error('team')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">Designation</label>
                                        {!! Form::select('designation', array('Moderator' => 'Moderator', 'Deputy' => 'Deputy'),$dbsc?$dbsc->designation:"",['class'=>'form-control']) !!}
                                        @error('designation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="igninput" class="form-label">In-game Name</label>
                                        {!! Form::text('igname', null, array('placeholder' => 'Enter IGN','class' => 'form-control')) !!}
                                        @error('igname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="igserverinput" class="form-label">In-game Server</label>
                                        {!! Form::text('igserver', null, array('placeholder' => 'Enter Server Code','class' => 'form-control')) !!}
                                        @error('igserver')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="ignidinput" class="form-label">In-game ID</label>
                                        {!! Form::text('ignid', null, array('placeholder' => 'Enter ML ID','class' => 'form-control')) !!}
                                        @error('ignid')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="descriptioninput"
                                            class="form-label">Description</label>
                                        {!! Form::textarea('description', null, array('placeholder' => 'Enter About or Introduction','class' => 'form-control')) !!}
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                        {{ Form::close() }}
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
