
<?php $__env->startSection('title'); ?> QA Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Dashboard <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> QA Dashboard <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php
$num_ind = 0;
$num_img = 0;

//print_r($overall_score[0]['overall_score']);
$oa_score = !empty($overall_score) ? number_format($overall_score[0]['overall_score'],2) : 0;
$accu_score = !empty($accuracy_score) ? number_format($accuracy_score[0]['accuracy_score'],2) : 0;
$time_score = !empty($timeliness_score) ? number_format($timeliness_score[0]['timeliness_score'],2) : 0;
$comm_score = !empty($communication_score) ? number_format($communication_score[0]['communication_score'],2) : 0;

// echo "<pre>";
// print_r($summary_infra_mo_yr);
// echo "</pre>";

$result = [];
$l_months = "";
foreach ($summary_infra_mo_yr as $item) {
    $group_id = $item['mo_now'];
    //$group_id = $item['attrib_name'];
    $value = $item['infractions'];
    $g_attrib = $item['attrib_name'];

    if (!isset($result[$group_id])) {
        $result[$group_id] = [];
    }
    $result[$group_id][] = ["attrib"=>$g_attrib,"values"=>$value];
    //$result[$group_id][] = $group_mo;
}

function sortMonths($a, $b) {
    //$monthsString = "Jan, Feb, Mar, Apr, May, June, Jul, Aug, Sep, Oct, Nov, Dec";
    //$monthsArray = explode(", ", $monthsString);
    $months = array(
        'Jan' => 1,
        'Feb' => 2,
        'Mar' => 3,
        'Apr' => 4
    );
    // $monthNumbers = array();
    // foreach ($monthsArray as $month) {
    //     $monthNumbers[] = date('n', strtotime($month));
    // }

    return $months[$a] - $months[$b];
    //return $monthNumbers;
}
uksort($result, 'sortMonths');
$l_months = !empty($result) ? "'" .implode("', '",array_keys($result))."'" : null;

// $result_mo = [];
// foreach ($result as $month => $data) {
//     $value = array();
//     $attrib_m = array();
//     foreach ($data as $attrib_data) {
//         $value[] = $attrib_data['values'];
//     }
//     foreach ($data as $attrib_m) {
//         $val[] = $attrib_m['attrib'];
//     }
//     $result_mo[$month][] = ['attrib'=>$val,'infra'=>implode(', ', $value)];
// }
// // Store the result in a variable
// $concatenated_month_and_values = $result_mo;

// foreach ($result as $group_id => $values) {
//     echo "Group ID: $group_id, Unique Values: " . implode(', ', $values) . PHP_EOL;
// }
// echo "<pre>";
// print_r($concatenated_month_and_values['Jan']);
// echo "</pre>";

// Combine month, attrib, and values into a single array
// $res = array();
// foreach ($result as $month => $data) {
//     foreach ($data as $attrib_data) {
//         $res[] = array(
//             'month' => $month,
//             'attrib' => $attrib_data['attrib'],
//             'values' => $attrib_data['values']
//         );
//     }
// }
// Group the data by 'attrib'
//$grouped_data = [];
//foreach ($result as $data) {
    //$attrib = $data['attrib'];
    //$grouped_data[$attrib][] = $data;
    //echo $data['attrib'];
//}

// // Implode the values for each 'attrib'
// $imploded_data = [];
// foreach ($grouped_data as $attrib => $data) {
//     $values = array_column($data, 'values');
//     $imploded_data[$attrib] = implode(', ', $values);
// }
$aa = $result['Jan'][0]['values'].",".$result['Feb'][0]['values'].",".$result['Mar'][0]['values'];
$cc = $result['Jan'][1]['values'].",".$result['Feb'][1]['values'].",".$result['Mar'][1]['values'];
$tt = $result['Jan'][2]['values'].",".$result['Feb'][2]['values'].",".$result['Mar'][2]['values'];
echo "<pre>";
print_r($aa);
echo "</pre>";

$i = 1;
?>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1"><?php echo e($greeting); ?><?php echo e(!empty($dbsc) ? ", ".$dbsc->firstname : ""); ?>!</h4>
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
                            <h4 class="card-title mb-0 flex-grow-1">Team Summary </h4>
                            <div style="text-align: right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-team-summary')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div>
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
                                        <?php $__empty_1 = true; $__currentLoopData = $overall_team_summary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1"><?php echo e($lts->Team); ?></div>
                                                </div>
                                            </td>
                                            <td><span class="text-default"><?php echo e($lts->overall_score); ?></span></td>
                                            <td><span class="text-default"><?php echo e($lts->timeliness_score); ?></span></td>
                                            <td><span class="text-default"><?php echo e($lts->communication_score); ?></span></td>
                                            <td><span class="text-default"><?php echo e($lts->accuracy_score); ?></span></td>
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
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Committed Infractions Per Team</h4>
                            <div style="text-align: right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-team-infraction')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-wrap mb-0"
                                    style="height: 300px;display: inline-block;width: 100%;overflow-y: scroll;">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" style="width:40%;">Team</th>
                                            <th scope="col" style="width:50%;">Attribute</th>
                                            <th scope="col" style="width:10%;">No. of Infractions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $infra_teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1"><?php echo e($lt->Team); ?></div>
                                                </div>
                                            </td>
                                            <td><span class="text-danger" style="width:50%;word-wrap: break-all;"><?php echo e($lt->Form_Attribute); ?></span></td>
                                            <td><span class="text-info" style="font-weight:bold;font-size:13px;text-align:right;"><?php echo e($lt->infractions); ?></span></td>
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

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div style="float:left;"><h4 class="card-title mb-0">Infractions Per Attribute (Year <?= date("Y") ?>)</h4></div>
                            <div style="text-align:right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-infraction-attribute')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="infra_column_chart" data-colors='["--vz-danger", "--vz-primary", "--vz-success"]'
                                class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div> <!-- .col-->
                <div class="col-xl-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div style="float:left;"><h4 class="card-title mb-0">Summary Infractions Committed Per Attribute</h4></div>
                            <div style="text-align:right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-summary-infraction')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div>
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

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Attribute Summary</h4>
                            <div style="text-align:right;">
                                <a class="btn btn-success btn-sm" href="<?php echo e(route('export-attribute-summary')); ?>"><i class="bx bx-spreadsheet"></i> Export</a>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered align-middle table-nowrap mb-0" 
                                    style="height: 300px;display: inline-block;width: 100%;overflow-y: scroll;">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col" style="width: 20%;">Attribute</th>
                                            <th scope="col" style="width: 60%;">No. of Infractions</th>
                                            <th scope="col" style="width: 30%;">Key Attribute</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $infra_form_attrib; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $la): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                    <?php
                                                        // if($la->attrib == 'A') {
                                                        //     echo 'Accuracy';
                                                        // } elseif($la->attrib == 'T') {
                                                        //     echo 'Timeliness';
                                                        // } elseif($la->attrib == 'C') {
                                                        //     echo 'Communication';
                                                        // } else {
                                                        //     echo $la->attrib;
                                                        // }
                                                    ?>
                                                    <?php echo e($la->attrib_name); ?>

                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="text-info text-right" style="font-weight:bold;font-size:13px;text-align:right;"><?php echo e($la->infractions); ?></span></td>
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


    // Basic Column Chart
    var chartColumnColors = getChartColorsArray("infra_column_chart");
    var options = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '50%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: true
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Accuracy',
            data: [
                <?= $aa ?>
            ],
        }, {
            name: 'Communication',
            data: [<?= $cc ?>],
        }, {
            name: 'Timeliness',
            data: [<?= $tt ?>],
        }],
        colors: chartColumnColors,
        xaxis: {
            categories: [<?= $l_months ?>],
        },
        yaxis: {
            title: {
                text: 'No. of Infractions'
            }
        },
        grid: {
            borderColor: '#f1f1f1',
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#infra_column_chart"),
        options
    );
    chart.render();


    //  Simple Pie Charts
    var chartPieBasicColors = getChartColorsArray("simple_pie_chart");
    var options = {
        series: [<?= $summary_infra_attrib[0]->infractions ?>,<?= $summary_infra_attrib[1]->infractions ?>,<?= $summary_infra_attrib[2]->infractions ?>],
        chart: {
            height: 382,
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/index-qa.blade.php ENDPATH**/ ?>