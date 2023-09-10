
<?php $__env->startSection('title'); ?> Moderator Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Dashboard <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> Moderator Dashboard <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php
$oa_score = !empty($overall_score) ? number_format($overall_score[0]['overall_score'],2) : 0;
$accu_score = !empty($accuracy_score) ? number_format($accuracy_score[0]['accuracy_score'],2) : 0;
$time_score = !empty($timeliness_score) ? number_format($timeliness_score[0]['timeliness_score'],2) : 0;
$comm_score = !empty($communication_score) ? number_format($communication_score[0]['communication_score'],2) : 0;
?>

<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1"><?php echo e($greeting); ?><?php echo e($greeting_name ?? ''); ?>!</h4>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        <?php echo e(date("F j, Y h:i:s A")); ?>

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
                            <h4 class="card-title mb-0 flex-grow-1">Committed Infractions</h4>
                            <!-- <div style="text-align: right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-team-infraction')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div> -->
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-wrap mb-0"
                                    style="height: 360px;display: inline-block;width: 100%;overflow-y: scroll;">
                                    <thead class="text-muted table-light">
                                            <th scope="col" style="width:50%;">Form Attribute</th>
                                            <th scope="col" style="width:15%;">No. of Infractions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $infra_mod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $im): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><span class="text-danger" style="width:50%;word-wrap: break-all;"><?php echo e($im->Form_Attribute); ?></span></td>
                                            <td><span class="text-info" style="font-weight:bold;font-size:13px;text-align:right;"><?php echo e($im->infractions); ?></span></td>
                                        </tr><!-- end tr -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
                                        <?php endif; ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div style="float:left;"><h4 class="card-title mb-0">Summary Infractions Committed Per Attribute</h4></div>
                            <!-- <div style="text-align:right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-summary-infraction')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div> -->
                        </div><!-- end card header -->

                        <div class="card-body">
                            <!-- <label class="badge bg-warning text-wrap">Still in progress...</label> -->
                            <div id="simple_pie_chart"
                                data-colors='["#bfad04", "#530296", "#02968f"]'
                                class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Attribute Summary</h4>
                            <!-- <div style="text-align:right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-attribute-summary')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div> -->
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-nowrap mb-0" 
                                    style="height: 310px;display: inline-block;width: 100%;overflow-y: scroll;">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" style="width: 15%;">Attribute</th>
                                            <th scope="col" style="width: 15%;">No. of Infractions</th>
                                            <th scope="col" style="width: 35%;">Date(s) Commited</th>
                                            <th scope="col" style="width: 35%;">Key Attribute</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $infra_form_attrib; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $la): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                    <?php echo e($la->attrib_name); ?>

                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="text-info text-right" style="font-weight:bold;font-size:13px;text-align:right;"><?php echo e($la->infractions); ?></span></td>
                                            <td>
                                                <span class="text-info text-right" style="width:10%;word-wrap: break-all;">
                                                <?php
                                                    $dc = "";
                                                    if(!empty($la->date_committed)) {
                                                        $dates = explode(",",$la->date_committed);
                                                        foreach ($dates as $d) {
                                                            $dc .='<label class="badge bg-primary text-wrap" style="font-size:11px;">'.$d.'</label> ';
                                                        }
                                                    }
                                                    echo $dc;
                                                ?>
                                                </span>
                                            </td>
                                            <td><span class="text-danger" style="width:10%;word-wrap: break-all;"><?php echo e($la->Form_Attribute); ?></span></td>
                                        </tr><!-- end tr -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
                                        <?php endif; ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

        </div> <!-- end .h-100-->
    </div> <!-- end col -->


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jsvectormap/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/libs/swiper/swiper.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('/assets/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    // $(document).on('click', '.pagination a', function(event){
    //     event.preventDefault(); 
    //     var page = $(this).attr('href').split('page=')[1];
    //     fetch_data(page);
    // });

    // function fetch_data(page)
    // {
    //     $.ajax({
    //         url:"/pagination/fetch_data?page="+page,success:function(data)
    //         {
    //             $('#table_data').html(data);
    //         }
    //     });
    // }

    // get colors array from the string
    function getChartColorsArray(chartId) {
        if (document.getElementById(chartId) !== null) {
            var colors = document.getElementById(chartId).getAttribute("data-colors");
            colors = JSON.parse(colors);
            return colors.map(function (value) {
                var newValue = value.replace(" ", "");
                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                    if (color) return color;
                    else return newValue;;
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

    //  Simple Pie Charts
    var chartPieBasicColors = getChartColorsArray("simple_pie_chart");
    var options = {
        series: [<?= $summary_infra_attrib[0]->infractions ?>,<?= $summary_infra_attrib[1]->infractions ?>,<?= $summary_infra_attrib[2]->infractions ?>],
        chart: {
            height: 360,
            type: 'pie',
        },
        labels: ['<?= $summary_infra_attrib[0]->attrib_name ?>', '<?= $summary_infra_attrib[1]->attrib_name ?>', '<?= $summary_infra_attrib[2]->attrib_name ?>'],
        legend: {
            position: 'bottom'
        },
        dataLabels: {
            dropShadow: {
                enabled: false,
            }
        },
        colors: chartPieBasicColors
    };

    var chart = new ApexCharts(document.querySelector("#simple_pie_chart"), options);
    chart.render();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/index-mod.blade.php ENDPATH**/ ?>