    
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <h1 class="float-left">Purchase Request Details</h1>
            <?php $__currentLoopData = $purchaserequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/requestdetails/create/<?php echo e($row->id); ?>" class="btn btn-outline-success float-right" style="margin: 3px;">Add Items</a>
                <a href="<?php echo e(action('PDFController@downloadPDF', $row->id)); ?>">Download PDF</a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="/purchaserequests" class="btn btn-outline-danger float-right" style="margin: 3px;">Back</a>
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead align="center">
                    <th colspan="2"><h3>Information</h3></th>
                </thead>
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
            </table>
        </div>
        <div class="col">
            <h3>Items</h3>
            <table class="table table-bordered table-hover">
                <thead align="center">
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Estimated Unit Cost</th>
                    <th>Estimated Cost</th>
                </thead>
                <tbody>
                    <?php if(count($requestdetails) > 0): ?>
                        <?php $__currentLoopData = $requestdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr align="center">
                            <td><?php echo e($row->description); ?></td>
                            <td><?php echo e($row->quantity); ?></td>
                            <td>Php <?php echo e($row->estimate_unit_cost); ?>/per</td>
                            <td>Php <?php echo e($row->estimated_cost); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?> 
                        <tr>
                            <td colspan="4" align="center">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/purchaserequests/show.blade.php ENDPATH**/ ?>