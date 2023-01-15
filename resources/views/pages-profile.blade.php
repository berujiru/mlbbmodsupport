@extends('layouts.master')
@section('title') @lang('translation.profile') @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}">
@endsection
@section('content')
<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg">
        @if(Auth::user()->hasRole('Community Manager'))
            <img src="{{ URL::asset('assets/images/manager.png') }}" alt="" class="profile-wid-img" />
        @elseif(Auth::user()->hasRole('Deputy'))
            <img src="{{ URL::asset('assets/images/deputy.png') }}" alt="" class="profile-wid-img" />
        @else
            <img src="{{ URL::asset('assets/images/moderator.png') }}" alt="" class="profile-wid-img" />
        @endif
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }}@endif" alt="user-img"
                    class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1">{{Auth::user()->name}}</h3>
                <p class="text-white-75">{{Auth::user()->email}}</p>
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
                <div class="flex-shrink-0">
                    <a href="{{ route('editProfile') }}" class="btn btn-soft-success waves-effect waves-light" style="color:#fff"><i
                            class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-4 text-muted">
                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-xxl-4">
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
                                    <h5 class="card-title mb-3">Info</h5>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                    <td class="text-muted">@if ($dbsc){{ $dbsc->firstname." ".$dbsc->middlename.". ".$dbsc->lastname }}@else{{ "None" }}@endif</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Contact No. :</th>
                                                    <td class="text-muted">@if ($dbsc){{ $dbsc->contactno }}@else{{ "None" }}@endif</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                    <td class="text-muted">@if ($dbsc){{ $dbsc->email }}@else{{ "None" }}@endif</td>
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

                        </div>                        
                        <div class="col-xxl-8">
                            @if (!$dbsc)
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-5">Complete Your Profile</h5>
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
                            @endif
                            

                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Infraction Stats</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="dropdown-btn text-muted" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                All Time <i class="mdi mdi-chevron-down ms-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">All Time</a>
                                                <!-- <a class="dropdown-item" href="#">Last 7 Days</a>
                                                <a class="dropdown-item" href="#">Last 30 Days</a>
                                                <a class="dropdown-item" href="#">Last 90 Days</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="prjects-status"
                                        data-colors='["--vz-success", "--vz-primary", "--vz-warning", "--vz-danger"]'
                                        class="apex-charts" dir="ltr"></div>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-center align-items-center mb-4">
                                            <h2 class="me-3 ff-secondary mb-0">{{array_sum($markdown_total)}}</h2>
                                            <div>
                                                <p class="text-muted mb-0">Total Infractions</p>
                                                <!-- <p class="text-success fw-medium mb-0">
                                                    <span class="badge badge-soft-success p-1 rounded-circle"><i
                                                            class="ri-arrow-right-down-line"></i></span> +3 New
                                                </p> -->
                                            </div>
                                        </div>
                                        <?php $i =0;?>
                                        @foreach($markdowns as $markdown)
                                        
                                            <div
                                                class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                                                <p class="fw-medium mb-0"><i
                                                        class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i>
                                                        {{$markdown->Form_Attribute}}</p>
                                                <div>
                                                    <span class="text-muted pe-5">{{$markdown->total}}</span>
                                                    <span class="text-success fw-medium fs-12">{{$markdown_period[$i]}}</span>
                                                </div>
                                            </div><!-- end -->
                                            <?php $i++?>
                                        @endforeach
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->

                            

                        </div>
                        <!--end col-->

                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/swiper/swiper.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/profile.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script> -->


    <script>

function getChartColorsArray(chartId) {
  if (document.getElementById(chartId) !== null) {
    var colors = document.getElementById(chartId).getAttribute("data-colors");
    colors = JSON.parse(colors);
    return colors.map(function (value) {
      var newValue = value.replace(" ", "");

      if (newValue.indexOf(",") === -1) {
        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
        if (color) return color;else return newValue;
        ;
      } else {
        var val = value.split(',');

        if (val.length == 2) {
          var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
          rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
          return rgbaColor;
        } else {
          return newValue;
        }
      }
    });
  }
}

    var isApexSeriesData = {};
var isApexSeries = document.querySelectorAll("[data-chart-series]");
isApexSeries.forEach(function (element) {
  var isApexSeriesVal = element.attributes;

  if (isApexSeriesVal["data-chart-series"]) {
    isApexSeriesData.series = isApexSeriesVal["data-chart-series"].value.toString();
    var radialbarhartoneColors = getChartColorsArray(isApexSeriesVal["id"].value.toString());
    var options = {
      series: [isApexSeriesData.series],
      chart: {
        type: 'radialBar',
        width: 36,
        height: 36,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
        enabled: false
      },
      plotOptions: {
        radialBar: {
          hollow: {
            margin: 0,
            size: '50%'
          },
          track: {
            margin: 1
          },
          dataLabels: {
            show: false
          }
        }
      },
      colors: radialbarhartoneColors
    };
    var chart = new ApexCharts(document.querySelector("#" + isApexSeriesVal["id"].value.toString()), options);
    chart.render();
  }
}); // Project Status charts

var donutchartProjectsStatusColors = getChartColorsArray("prjects-status");
var options = {
  series: <?= "[".implode(",",$markdown_total)."]" ?>,
  labels: <?= "[".implode(",",$markdown_title)."]" ?>,
  chart: {
    type: "donut",
    height: 230
  },
  plotOptions: {
    pie: {
      size: 100,
      offsetX: 0,
      offsetY: 0,
      donut: {
        size: "90%",
        labels: {
          show: false
        }
      }
    }
  },
  dataLabels: {
    enabled: false
  },
  legend: {
    show: false
  },
  stroke: {
    lineCap: "round",
    width: 0
  },
  colors: donutchartProjectsStatusColors
};
var chart = new ApexCharts(document.querySelector("#prjects-status"), options);
chart.render();

;
</script>


    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
