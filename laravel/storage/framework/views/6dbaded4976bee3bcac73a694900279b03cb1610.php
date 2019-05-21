<?php $__env->startSection('content'); ?>
    <h1>Search Results</h1>
    <?php $__currentLoopData = $costcenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>Yea: <?php echo e($row->costcenter_name); ?></p>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/selfservice.blade.php ENDPATH**/ ?>