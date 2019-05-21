    
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <h1 class="float-left">Cost Centers</h1>
            <a href="/costcenters/create" class="btn btn-success float-right">Add Cost Center</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered table-sm">
            <thead align="center">
                <th>#</th>
                <th>Cost Center</th>
                <th>Section</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if(count($costcenters) > 0): ?>
                    <?php $__currentLoopData = $costcenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($row->id); ?></td>
                            <td><?php echo e($row->costcenter_name); ?></td>
                            <td><?php echo e($row->section_name); ?></td>
                            <td align="center">
                                
                                <a href="" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/costcenters/index.blade.php ENDPATH**/ ?>