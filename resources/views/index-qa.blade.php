@extends('layouts.master')
@section('title') QA Dashboard @endsection
@section('css')
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Dashboard @endslot
@slot('title') QA Dashboard @endslot
@endcomponent
<?php
$num_ind = 0;
$num_img = 0;

//print_r($overall_score[0]['overall_score']);
$oa_score = !empty($overall_score) ? number_format($overall_score[0]['overall_score'],2) : 0;
$accu_score = !empty($accuracy_score) ? number_format($accuracy_score[0]['accuracy_score'],2) : 0;
$time_score = !empty($timeliness_score) ? number_format($timeliness_score[0]['timeliness_score'],2) : 0;
$comm_score = !empty($communication_score) ? number_format($communication_score[0]['communication_score'],2) : 0;

// echo "<pre>";
// echo print_r($overall_team_summary);
// echo "</pre>";

?>
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
                <div class="col-xl-3 col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Overall Score</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                        data-target="<?= $oa_score ?>"><?= $oa_score ?></span></h2>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i class="bx bxs-bar-chart-alt-2 text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!--newly registered -->
                <div class="col-xl-3 col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Score on Timeliness</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                        data-target="<?= $time_score ?>"><?= $time_score ?></span></h2>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i class="bx bx-timer text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!-- number of teams -->
                <div class="col-xl-3 col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Communication</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                        data-target="<?= $comm_score ?>"><?= $comm_score ?></span></h2>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i class="bx bx-chat text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!-- number of teams -->
                <div class="col-xl-3 col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-uppercase fw-medium text-muted mb-0">Accuracy</p>
                                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                            data-target="<?= $accu_score ?>"><?= $accu_score ?></span></h2>
                                </div>
                                <div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                            <i class="bx bx-target-lock text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Team Summary</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-wrap mb-0" 
                                    style="height: 300px;display: inline-block;overflow: auto;">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">Team</th>
                                            <th scope="col">Overall Score</th>
                                            <th scope="col">Timeliness</th>
                                            <th scope="col">Communication</th>
                                            <th scope="col">Accuracy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($overall_team_summary as $lts)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{$lts->Team}}</div>
                                                </div>
                                            </td>
                                            <td><span class="text-default">{{$lts->overall_score}}</span></td>
                                            <td><span class="text-default">{{$lts->timeliness_score}}</span></td>
                                            <td><span class="text-default">{{$lts->communication_score}}</span></td>
                                            <td><span class="text-default">{{$lts->accuracy_score}}</span></td>
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
                            <h4 class="card-title mb-0 flex-grow-1">Commited Infractions Per Team</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-wrap mb-0"
                                    style="height: 300px;display: inline-block;width: 100%;overflow: auto;">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" style="width:40%;">Team</th>
                                            <th scope="col" style="width:50%;">Attribute</th>
                                            <th scope="col" style="width:10%;">No. of Infractions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($infra_teams as $lt)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{$lt->Team}}</div>
                                                </div>
                                            </td>
                                            <td><span class="text-danger" style="width:50%;word-wrap: break-all;">{{$lt->Form_Attribute}}</span></td>
                                            <td><span class="text-info" style="font-weight:bold;font-size:13px;text-align:right;">{{$lt->infractions}}</span></td>
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
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Attribute Summary</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" style="width: 20%;">Main Attribute</th>
                                            <th scope="col" style="width: 60%;">Key Attribute</th>
                                            <th scope="col" style="width: 20%;">No. of Infractions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($list_attributes as $la)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{$la->attribute_name}}</div>
                                                </div>
                                            </td>
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
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Infractions Per Attribute (Monthly, Year <?= date("Y") ?>)</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="column_chart" data-colors='["--vz-danger", "--vz-primary", "--vz-success"]'
                                class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div> <!-- .col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Summary Infractions Committed Per Attribute</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="simple_pie_chart"
                                data-colors='["--vz-danger", "--vz-primary", "--vz-success"]'
                                class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div> <!-- end .h-100-->
    </div> <!-- end col -->


</div>

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/data/apexcharts-column.init.data.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/data/apexcharts-pie.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page)
    {
        $.ajax({
            url:"/pagination/fetch_data?page="+page,success:function(data)
            {
                $('#table_data').html(data);
            }
        });
    }
});
</script>
@endsection
