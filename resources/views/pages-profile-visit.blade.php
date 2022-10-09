@extends('layouts.master')
@section('title') @lang('translation.profile') @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}">
@endsection
@section('content')
<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg">
            <img src="{{ URL::asset('assets/images/moderator.png') }}" alt="" class="profile-wid-img" />
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="@if ($user?->avatar != ''){{ URL::asset('images/' . $user->avatar ) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif" alt="user-img"
                    class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1">@if ($dbsc){{$dbsc->firstname." ".$dbsc->lastname}}@else{{ "None" }}@endif  </h3>
                <p class="text-white-75">{{"-Email Hidden-"}}</p>
                <div class="hstack text-white-50 gap-1">
                    <div class="me-2"><i
                            class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>@if ($dbsc){{ $dbsc->location }}@else{{ "None" }}@endif</div>
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
                                                    <td class="text-muted"><b> @if ($dbsc){{ $dbsc->modid }}@else{{ "None" }}@endif </b> <br/>
                                                    <i>Mod ID not accurate?</i> <button type="button" class="btn btn-danger btn-sm" id="ajax-alert">Request Support</button>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                    <td class="text-muted">@if ($dbsc){{ $dbsc->firstname." ".$dbsc->middlename.". ".$dbsc->lastname }}@else{{ "None" }}@endif</td>
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
                                                    <td class="text-muted">@if ($dbsc){{ $dbsc->location }}@else{{ "None" }}@endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">FB Link</th>
                                                    <td class="text-muted">@if ($dbsc){{ $dbsc->fblink }}@else{{ "None" }}@endif</td>
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

                                                @foreach ($data_nte as $key => $nte)
                                                    <li>
                                                        <div class="col-mail col-mail-1">
                                                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15 active">
                                                                <i class="ri-star-fill"></i>
                                                            </button>
                                                            <a href="#" class="title">{{$nte->Attribute}}</a>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <a href="#" class="subject">
                                                                    <span class="bg-success badge me-2">{{$nte->RecommendedAction}}</span>
                                                                    Hello - <span class="teaser">{{$nte->Attribute}}</span>

                                                            
                                                            
                                                            </a>
                                                            <div class="date">{{$nte->InfractionDate}}</div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                    

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
                                                    <p class="mb-1">@if ($dbsc){{ $dbsc->description }}@else{{ "None" }}@endif</p>
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
                                                        class="fw-semibold">@if ($dbsc){{ $dbsc->igname }}@else{{ "None" }}@endif</a>
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
                                                        class="fw-semibold">@if ($dbsc){{ $dbsc->igserver }}@else{{ "None" }}@endif</a>
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
                                                        class="fw-semibold">@if ($dbsc){{ $dbsc->ignid }}@else{{ "None" }}@endif</a>
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
                                                    <h6 class="text-truncate mb-0">@if ($dbsc){{ $dbsc->designation }}@else{{ "None" }}@endif</h6>
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

                                                @foreach ($data as $key => $mail)
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
                                                                @if($mail->OVERALLSCORE=="100.00%")
                                                                    <span class="bg-success badge me-2">Perfect</span>
                                                                    Hello - <span class="teaser">Keep up the good work!</span>
                                                                @else
                                                                    <span class="bg-warning badge me-2">Infractions</span>
                                                                    Hello - <span class="teaser">Needs Improvement from the following:</span>
                                                                @endif
                                                            
                                                            
                                                            </a>
                                                            <div class="date">{{$mail->Date}}</div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                    

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
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/swiper/swiper.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/profile.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/sweetalerts.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
