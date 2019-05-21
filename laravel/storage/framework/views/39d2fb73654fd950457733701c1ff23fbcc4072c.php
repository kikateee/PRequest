    
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <h1 class="float-left">Fund Sources</h1>
            <a href="/fundsources/create" class="btn btn-success float-right">Add Source</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered table-sm">
            <thead align="center">
                <th>#</th>
                <th>Description</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if(count($fundsources) > 0): ?>
                    <?php $__currentLoopData = $fundsources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($row->id); ?></td>
                            <td><?php echo e($row->description); ?></td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/fundsources/index.blade.php ENDPATH**/ ?>