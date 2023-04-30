<table
    class="table table-borderless table-centered align-middle table-wrap mb-0"
    style="height: 300px;display: inline-block;width: 100%;overflow-y: scroll;">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col" style="width:40%;"><b>Team</b></th>
            <th scope="col" style="width:50%;"><b>Attribute</b></th>
            <th scope="col" style="width:10%;"><b>No. of Infractions</b></th>
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
</table><!-- end table --><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/export/export-team-committed-infraction.blade.php ENDPATH**/ ?>