
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Users Manual'); ?>  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Manual <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?> View  <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-sm btn-primary" href="<?php echo e(route('user-manual.index')); ?>"> <i class="bx bx-arrow-back"></i></a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xl-12">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">View Manual</h5>
                </div>
                <div class="card-body pt-2">
                    <div id="pspdfkit" style="height: 100vh"></div>
                    <!-- <a href="<?php echo e(URL::asset('/assets/viewerjs/#../manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf')); ?>">aaa</a> -->
                    <!-- <a href="http://example.org/ViewerJS/#../path/to/filename.ext"> -->
                    <!-- <iframe src = "/assets/viewerjs/#../manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf" width='400' height='300' allowfullscreen webkitallowfullscreen></iframe> -->
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
        <!-- end stickey -->

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/pspdfkit/pspdfkit.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/viewerjs/pdf.js')); ?>"></script>
<script>
	PSPDFKit.load({
		container: "#pspdfkit",
  		document: "<?php echo e(URL::asset('/manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf')); ?>" // Add the path to your document here.
	})
	.then(function(instance) {
		console.log("PSPDFKit loaded", instance);
	})
	.catch(function(error) {
		console.error(error.message);
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/user-manual/show.blade.php ENDPATH**/ ?>