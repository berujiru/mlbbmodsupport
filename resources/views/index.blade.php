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
                    </div> <!-- end card-->
                </div> <!-- end col-->

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
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Teams</h4>
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
                                            <td><span class="text-danger">no data yet</span></td>
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
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Today's Birthday</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-hover table-centered align-middle table-nowrap mb-0">
                                    <tbody>
                                        @forelse($today_birthdays as $tb)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="avatar-sm bg-light rounded p-1 me-2">
                                                        <img src="{{ URL::asset('assets/images/companies/img-1.png') }}"
                                                            alt="" class="img-fluid d-block" />
                                                    </div>
                                                    <div>
                                                        <h5 class="fs-14 my-1">{{$tb->firstname." ".$tb->lastname}}</h5>
                                                        <span class="text-muted">{{$tb->modid}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 my-1 fw-normal">{{date("F j",strtotime($tb->birthday))}}</h5>
                                            </td>
                                            <td></td>
                                        </tr>
                                        @empty
                                            <tr><td colspan="3" class="text-muted">No birthday celebrant today</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end .h-100-->

    </div> <!-- end col -->

    <div class="col-auto layout-rightside-col">
        <div class="overlay"></div>
        <div class="layout-rightside">
            <div class="card h-100 rounded-0">
                <div class="card-body p-0">
                    <div class="p-3">
                        <h6 class="text-muted mb-0 text-uppercase fw-semibold">Recent Activity</h6>
                    </div>
                    <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                        <div class="acitivity-timeline acitivity-main">
                            <div class="acitivity-item d-flex">
                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                    <div
                                        class="avatar-title bg-soft-success text-success rounded-circle">
                                        <i class="ri-shopping-cart-2-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 lh-base">Purchase by James Price</h6>
                                    <p class="text-muted mb-1">Product noise evolve smartwatch </p>
                                    <small class="mb-0 text-muted">02:14 PM Today</small>
                                </div>
                            </div>
                            <div class="acitivity-item py-3 d-flex">
                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                    <div
                                        class="avatar-title bg-soft-danger text-danger rounded-circle">
                                        <i class="ri-stack-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 lh-base">Added new <span
                                            class="fw-semibold">style collection</span></h6>
                                    <p class="text-muted mb-1">By Nesta Technologies</p>
                                    <div class="d-inline-flex gap-2 border border-dashed p-2 mb-2">
                                        <a href="apps-ecommerce-product-details"
                                            class="bg-light rounded p-1">
                                            <img src="{{ URL::asset('assets/images/products/img-8.png') }}" alt=""
                                                class="img-fluid d-block" />
                                        </a>
                                        <a href="apps-ecommerce-product-details"
                                            class="bg-light rounded p-1">
                                            <img src="{{ URL::asset('assets/images/products/img-2.png') }}" alt=""
                                                class="img-fluid d-block" />
                                        </a>
                                        <a href="apps-ecommerce-product-details"
                                            class="bg-light rounded p-1">
                                            <img src="{{ URL::asset('assets/images/products/img-10.png') }}" alt=""
                                                class="img-fluid d-block" />
                                        </a>
                                    </div>
                                    <p class="mb-0 text-muted"><small>9:47 PM Yesterday</small></p>
                                </div>
                            </div>
                            <div class="acitivity-item py-3 d-flex">
                                <div class="flex-shrink-0">
                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt=""
                                        class="avatar-xs rounded-circle acitivity-avatar">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 lh-base">Natasha Carey have liked the products
                                    </h6>
                                    <p class="text-muted mb-1">Allow users to like products in your
                                        WooCommerce store.</p>
                                    <small class="mb-0 text-muted">25 Dec, 2021</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end .rightbar-->

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
@endsection
