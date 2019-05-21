    
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <h1 class="float-left">Purchase Requests</h1>
            
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered table-hover table-sm">
            <thead align="center">
                <th>#</th>
                <th>Cost Center</th>
                <th>Fund Source</th>
                <th>SAI Number</th>
                <th>Date</th>
                
                <th>Request Origin</th>
                <th>Approved By</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if(count($purchaserequests) > 0): ?>
                    <?php $__currentLoopData = $purchaserequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr align="center">
                            <td><?php echo e($row->id); ?></td>
                            <td><?php echo e($row->costcenter_name); ?></td>
                            <td><?php echo e($row->source); ?></td>
                            <td><?php echo e($row->sai_number); ?></td>
                            <td><?php echo e($row->date); ?></td>
                            
                            <td><?php echo e($row->request_origin); ?></td>
                            <td><?php echo e($row->approved_by); ?></td>
                            <td align="center">
                                <a href="/purchaserequests/<?php echo e($row->id); ?>" class="btn btn-outline-primary btn-sm">View</a>
                                
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <?php else: ?> 
                    <tr>
                        <td colspan="9" align="center">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            
        </table>
        
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/purchaserequests/index.blade.php ENDPATH**/ ?>