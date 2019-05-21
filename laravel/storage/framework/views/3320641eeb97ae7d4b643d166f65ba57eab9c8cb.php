    
<?php $__env->startSection('content'); ?>
    <div class="jumbotron jumbotron">
        <div class="container">
            <h1 class="display-5">Create a Purchase Request</h1>
            <p class="lead">You may add another item after you submit this form.</p>
        </div>
    </div>
    <hr>
    <?php echo Form::open(['action' => 'PurchaseRequestsController@store', 'method' => 'POST']); ?>

    <div class="row">
        <div class="col-md-6">
            <h4>Information</h4>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="costcenter_id">Cost Center</label>
                            <?php $__currentLoopData = $costcenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" value="<?php echo e($row->costcenter_name); ?>" class="form-control" readonly>
                                <input type="hidden" name="costcenter_id" value="<?php echo e($row->id); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col">
                        <label for="fundsource_id">Fund Sources</label>
                            <?php $__currentLoopData = $fundsources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" value="<?php echo e($row->source); ?>" class="form-control" readonly> 
                                <input type="hidden" name="fundsource_id" value="<?php echo e($row->id); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div> 
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <?php echo e(Form::label('sai_number', 'SAI Number')); ?>

                        <?php echo e(Form::number('sai_number', '', ['min' => '0', 'placeholder' => 'SAI Number' ,'class' => 'form-control'])); ?>

                    </div>
                    <div class="col">
                        <?php echo e(Form::label('date', 'Date')); ?>

                        <?php echo e(Form::date('date', '', ['placeholder' => 'Date' ,'class' => 'form-control'])); ?>

                    </div>
                </div>
            </div>
            
        </div>
        <div class="col">
            <h4>Item Requested</h4>
            <br>
            <div class="form-group">
                
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label for="item_id">Item</label>
                    <input type="hidden" value="<?php echo e($row->id); ?>" name="item_id" readonly>
                    <input type="text" value="<?php echo e($row->description); ?>" class="form-control" readonly>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <?php echo e(Form::label('quantity', 'Quantity')); ?>

                        <?php echo e(Form::number('quantity', '', ['min' => '0', 'placeholder' => 'Quantity of Items' ,'class' => 'form-control'])); ?>

                    </div>
                    <div class="col">
                        <?php echo e(Form::label('estimate_unit_cost', 'Estimate Cost per Unit')); ?>

                        <?php echo e(Form::number('estimate_unit_cost', '', ['min' => '0', 'placeholder' => 'Estimated Cost of an Item' ,'class' => 'form-control'])); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <?php echo e(Form::label('purpose', 'Purpose')); ?>

                <?php echo e(Form::textarea('purpose', '', ['rows' => '5', 'cols' => '50', 'placeholder' => 'Purpose of the purchase request...' ,'class' => 'form-control'])); ?>

            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <?php echo e(Form::label('request_origin', 'Request Origin')); ?>

                <?php echo e(Form::text('request_origin', '', ['placeholder' => 'Request Origin' ,'class' => 'form-control'])); ?>

            </div>
            <div class="col">
                <?php echo e(Form::label('approved_by', 'Approved By')); ?>

                <?php echo e(Form::text('approved_by', '', ['placeholder' => 'Approved By' ,'class' => 'form-control'])); ?>

            </div>
        </div>
    </div>
        <hr>
        <a href="/purchaserequests" class="btn btn-outline-danger float-right" style="margin: 3px;">Cancel</a>
        <?php echo e(Form::submit('Submit', ['style' => 'margin: 3px;', 'class' => 'btn btn-outline-success float-right'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/purchaserequests/create.blade.php ENDPATH**/ ?>