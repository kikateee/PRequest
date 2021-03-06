    
<?php $__env->startSection('content'); ?>
    <h1>Add Item</h1>
    <?php echo Form::open(['action' => 'ItemsController@store', 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo e(Form::label('description', 'Item Name')); ?>

            <?php echo e(Form::text('description', '', ['placeholder' => 'Description' ,'class' => 'form-control'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('stock', 'Stock')); ?>

            <?php echo e(Form::number('stock', '', ['placeholder' => 'Quantity' ,'class' => 'form-control'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('unit_of_issue', 'Unit of Issue')); ?>

            <?php echo e(Form::text('unit_of_issue', '', ['placeholder' => '...' ,'class' => 'form-control'])); ?>

        </div>
        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success float-right'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/items/create.blade.php ENDPATH**/ ?>