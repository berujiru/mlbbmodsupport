<table
    class="table table-borderless table-centered align-middle table-wrap mb-0">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col"><b>Attribute</b></th>
            <th scope="col"><b>No. of Infractions (<?= $w_year == 1 ? date("Y") : 'All' ?>)</b></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $summary_infra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><span class="text-danger" style="word-wrap: break-all;"><?php echo e($lt->attrib_name); ?></span></td>
            <td><span class="text-info" style="font-weight:bold;font-size:13px;text-align:right;"><?php echo e($lt->infractions); ?></span></td>
        </tr><!-- end tr -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="3" class="text-muted">No data to be displayed</td></tr>
        <?php endif; ?>
    </tbody><!-- end tbody -->
</table><!-- end table --><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/export/export-infraction-attribute.blade.php ENDPATH**/ ?>