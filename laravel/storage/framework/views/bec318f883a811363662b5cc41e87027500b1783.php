    
<?php $__env->startSection('content'); ?>
    <h1>Add Source</h1>
    <?php echo Form::open(['action' => 'FundSourcesController@store', 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo e(Form::label('description', 'Fund Source')); ?>

            <?php echo e(Form::text('description', '', ['placeholder' => 'Description' ,'class' => 'form-control'])); ?>

        </div>
        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success float-right'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/fundsources/create.blade.php ENDPATH**/ ?>