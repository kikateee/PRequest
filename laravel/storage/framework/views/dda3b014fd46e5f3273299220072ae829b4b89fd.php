<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Purchase Request Details</h1>
    </div>
    <table class="table table-bordered">
        <tr>
            <td colspan="2">Information</td>
        </tr>
            <?php $__currentLoopData = $purchaserequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="font-weight: bold;">Purchase Request #</td>
                    <td><?php echo e($row->id); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Cost Center</td>
                    <td><?php echo e($row->costcenter_name); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Fund Source</td>
                    <td><?php echo e($row->source); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">SAI Number</td>
                    <td><?php echo e($row->sai_number); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Date</td>
                    <td><?php echo e($row->date); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Request Origin</td>
                    <td><?php echo e($row->request_origin); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Approved By</td>
                    <td><?php echo e($row->approved_by); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" colspan="2">Purpose:</td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo e($row->purpose); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="2">Items</td>
            </tr>
            <?php if(count($requestdetails) > 0): ?>
                <?php $__currentLoopData = $requestdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="font-weight: bold;">Description</td>
                    <td><?php echo e($row->description); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Quantity</td>
                    <td><?php echo e($row->quantity); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Estimated Unit Cost</td>
                    <td>Php <?php echo e($row->estimate_unit_cost); ?>/per</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Estimated Cost</td>
                    <td>Php <?php echo e($row->estimated_cost); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/purchaserequests/pdf.blade.php ENDPATH**/ ?>