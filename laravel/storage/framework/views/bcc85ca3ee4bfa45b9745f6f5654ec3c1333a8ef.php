    
<?php $__env->startSection('content'); ?>
    <h1>Add Item into Purchase Request</h1>
    <?php echo Form::open(['action' => 'PurchaseRequestDetailsController@store', 'method' => 'POST']); ?>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <?php echo e(Form::label('description', 'Item Name')); ?>

                    <select name="item_id" class="form-control">
                        <option value="">Select an Item</option>
                        <optgroup label="Items">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <?php echo e(Form::label('quantity', 'Quantity')); ?>

                    <?php echo e(Form::number('quantity', '', ['min' => '0', 'placeholder' => 'Quantity of Items' ,'class' => 'form-control'])); ?>

                </div>
                <div class="col">
                    <?php echo e(Form::label('estimate_unit_cost', 'Estimate Unit Cost')); ?>

                    <?php echo e(Form::number('estimate_unit_cost', '', ['min' => '0', 'placeholder' => 'Estimate Cost per Unit' ,'class' => 'form-control'])); ?>

                </div>
            </div>
        </div>
        <hr>
        <?php $__currentLoopData = $purchaserequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/purchaserequests/<?php echo e($row->id); ?>" class="btn btn-outline-danger float-right" style="margin: 3px;">Cancel</a>
            <?php echo e(Form::hidden('purq_id', $row->id)); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php echo e(Form::submit('Submit', ['style' => 'margin: 3px;', 'class' => 'btn btn-outline-success float-right'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/requestdetails/create.blade.php ENDPATH**/ ?>