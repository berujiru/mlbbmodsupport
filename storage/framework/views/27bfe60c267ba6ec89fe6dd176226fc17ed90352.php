
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Apex_Pie_Chart'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Apexcharts <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Apex Pie Charts <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Simple Pie Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="simple_pie_chart"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Simple Donut Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="simple_dount_chart"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Updating Donut Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div>
                        <div id="updating_donut_chart"
                            data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                            class="apex-charts" dir="ltr"></div>

                        <div class="d-flex align-items-start flex-wrap gap-2 justify-content-center mt-4">
                            <button id="add" class="btn btn-light btn-sm">
                                + ADD
                            </button>

                            <button id="remove" class="btn btn-light btn-sm">
                                - REMOVE
                            </button>

                            <button id="randomize" class="btn btn-light btn-sm">
                                RANDOMIZE
                            </button>

                            <button id="reset" class="btn btn-light btn-sm">
                                RESET
                            </button>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Monochrome Pie Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="monochrome_pie_chart" data-colors='["--vz-primary"]' class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Gradient Donut Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="gradient_chart"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Patterned Donut Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="pattern_chart"
                        data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pie Chart with Image Fill</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="image_pie_chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/apexcharts-pie.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/charts-apex-pie.blade.php ENDPATH**/ ?>