@extends('layouts.master')
@section('title') @lang('translation.dashboards') @endsection
@section('css')
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Dashboard @endslot
@endcomponent
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">{{$greeting}}{{!empty($dbsc) ? ", ".$dbsc->firstname : ""}}!</h4>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        {{ date("F j, Y h:i:s A") }}
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
                                            data-target="{{number_format($active_accounts,2)}}">0</span></h2>
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
                                            data-target="{{number_format($total_newly_registered,2)}}">0</span></h2>
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
                                            data-target="{{number_format($total_teams,2)}}">0</span></h2>
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
                                            data-target="{{number_format($total_male,2)}}">0</span></h2>
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
                                            data-target="{{number_format($total_female,2)}}">0</span></h2>
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
                                        @forelse($list_teams as $lt)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="avatar-sm bg-light rounded p-1 me-2">
                                                        <img src="{{ URL::asset('assets/images/companies/img-1.png') }}"
                                                            alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div class="flex-grow-1">{{$lt->team_name}}</div>
                                                </div>
                                            </td>
                                            <td><span class="text-success">{{$lt->number_people}}</span></td>
                                            <td><span class="text-danger">no data yet</span></td>
                                            <td><?= empty($lt->headed_by) ? "<span class='text-danger'>no data yet</span>" : "<span class='text-primary'>$lt->headed_by</span>" ?></td>
                                        </tr><!-- end tr -->
                                        @empty
                                            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
                                        @endforelse
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
                                <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    @forelse($today_birthdays as $tb)
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner" role="listbox" style="width:100%;max-height: 400px !important;">
                                        <div class="carousel-item active" data-interval="2000">
                                            <img src="{{URL::asset('img_birthday/photo_2022-08-14_18-51-49.jpg')}}" class="d-block w-100 img-fluid mx-auto" alt="...">
                                        </div>
                                        <div class="carousel-item" data-interval="2000">
                                            <img src="{{URL::asset('images/' . Auth::user()->avatar)}}" class="d-block w-100 img-fluid mx-auto" alt="...">
                                        </div>
                                        <div class="carousel-item" data-interval="2000">
                                            <img src="{{URL::asset('images/1657195292.jpg')}}" class="d-block w-100 img-fluid mx-auto" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    @empty
                                    <!--  no display -->
                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr><td colspan="3" class="text-muted">No birthday celebrant today</td></tr>
                                        </tbody>
                                    </table>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->
        <!--</div> <!-- end .h-100-->

    </div> <!-- end col -->


</div>

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
