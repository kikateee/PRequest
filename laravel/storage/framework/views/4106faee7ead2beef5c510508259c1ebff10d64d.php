    
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-6">
            <h1 class="display-4 float-left">Items</h1>
            
        </div>
    </div>
        
        <hr>
        <div class="row">
            <form action="/search" method="GET">
                <div class="col">
                    Filter By
                    <select name="filterBy" class="form-control" required>
                        <optgroup label="Filters">
                            <option value="costcenter_name">Cost Center</option>
                            <option value="source">Fund Source</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col">
                    <label for=""></label>
                    <div class="input-group mb-3">
                        <input type="text" name="searchInput" class="form-control" required>
                        <div class="input-group-append">
                            <input type="Submit" value="Search" class="btn btn-outline-secondary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    
    
    <div class="row">
        <div class="col">
            <?php echo Form::open(['action' => 'PurchaseRequestsController@create', 'method' => 'POST']); ?>

            <table class="table table-bordered table-hover table-sm">
                <thead align="center">
                    <th>#</th>
                    <th>Description</th>
                    <th>Cost Center</th>
                    <th>Fund Source</th>
                    <th>Stock</th>
                    <th>Unit of Issue</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if(count($items) > 0): ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr align="center">
                                    <td><?php echo e($row->id); ?></td>
                                    <?php echo e(Form::hidden('item_id', $row->id)); ?>

                                    <td><?php echo e($row->description); ?></td>
                                    <?php echo e(Form::hidden('description', $row->description)); ?>

                                        <td><?php echo e($row->costcenter_name); ?></td>
                                        <?php echo e(Form::hidden('costcenter_id', $row->costcenter_id)); ?>

                                        <td><?php echo e($row->source); ?></td>
                                        <?php echo e(Form::hidden('fundsource_id', $row->fundsource_id)); ?>

                                    <td><?php echo e($row->stock); ?></td>
                                    <?php echo e(Form::hidden('stock', $row->stock)); ?>

                                    <td><?php echo e($row->unit_of_issue); ?></td>
                                    <?php echo e(Form::hidden('unit_of_issue', $row->unit_of_issue)); ?>

                                    <td>
                                        
                                        
                                    <a href="/purchaserequests/create/<?php echo e($row->id); ?>/<?php echo e($row->costcenter_id); ?>/<?php echo e($row->fundsource_id); ?>" class="btn btn-outline-primary btn-sm">Create Purchase Request</a>
                                        
                                        
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
            <?php echo Form::close(); ?>

        </div>
    </div>
    <?php echo e($items->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PRequest\laravel\resources\views/results/fundsources.blade.php ENDPATH**/ ?>