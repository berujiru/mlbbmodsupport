
<table
    class="table table-borderless table-centered align-middle table-nowrap mb-0">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col" style="width: 20%;"><b>Attribute</b></th>
            <th scope="col" style="width: 60%;"><b>No. of Infractions</b></th>
            <th scope="col" style="width: 30%;"><b>Key Attribute</b></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $attrib_summary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $as): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1"><?php echo e($as->attrib_name); ?></div>
                </div>
            </td>
            <td><span class="text-info text-right" style="font-weight:bold;font-size:13px;text-align:right;"><?php echo e($as->infractions); ?></span></td>
            <td><span class="text-danger" style="width:10%;word-wrap: break-all;"><?php echo e($as->Form_Attribute); ?></span></td>
        </tr><!-- end tr -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
    </tbody><!-- end tbody -->
</table><!-- end table --><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/export/export-attribute-summary.blade.php ENDPATH**/ ?>