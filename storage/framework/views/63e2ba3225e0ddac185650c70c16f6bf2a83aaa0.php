<table
    class="table table-borderless table-centered align-middle table-wrap mb-0" 
    style="height: 300px;display: inline-block;overflow: auto;">
    <thead class="text-muted table-light">
        <tr>
            <th scope="col"><b>Team</b></th>
            <th scope="col"><b>Overall Score</b></th>
            <th scope="col"><b>Timeliness</b></th>
            <th scope="col"><b>Communication</b></th>
            <th scope="col"><b>Accuracy</b></th>
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
</table><!-- end table --><?php /**PATH D:\xampp2\htdocs\mlbbmodsupport\resources\views/export-team-summary.blade.php ENDPATH**/ ?>