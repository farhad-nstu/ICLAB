<?php $__env->startSection('title', $title); ?>
<?php $__env->startPush('style'); ?>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <style>
        .info {
            background-color: aqua;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><?php echo $__env->yieldContent('title'); ?></h4>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-wrap gap-2 float-end">
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-light waves-effect"><i
                                        class="fas-light fas fa-angle-double-left"></i> Back</a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.index')): ?>
                                    <a href="<?php echo e(route('products.index')); ?>"
                                        class="btn btn-info waves-effect waves-light">Products List</a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.create')): ?>
                                    <a href="<?php echo e(route('products.create')); ?>"
                                        class="btn btn-primary waves-effect waves-light">Create
                                        New</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if($errors->any() && !old('_method')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <?php echo $__env->make('layouts.components.input', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Name',
                                        'type' => 'text',
                                        'field' => 'name',
                                        'id' => 'name',
                                        'placeholder' => 'Product name',
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <?php echo $__env->make('layouts.components.select', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Category',
                                        'field' => 'category_id',
                                        'id' => 'status1',
                                        'placeholder' => 'Choose Category',
                                        'values' => $categories,
                                        'value_type' => 'associative',
                                        'value_key' => 'name',
                                        'index' => 'id',
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <?php echo $__env->make('layouts.components.input', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Price',
                                        'type' => 'text',
                                        'field' => 'price',
                                        'id' => 'price',
                                        'placeholder' => 'Product price',
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <?php echo $__env->make('layouts.components.input', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Discount (In %)',
                                        'type' => 'number',
                                        'field' => 'discount',
                                        'id' => 'discount',
                                        'placeholder' => 'Product discount',
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <?php echo $__env->make('layouts.components.select', [
                                        'wrap' => 'col-md-12',
                                        'label' => 'Status',
                                        'field' => 'status',
                                        'id' => 'status1',
                                        'placeholder' => 'Choose One',
                                        'values' => $statuses,
                                        'value_type' => 'indexed',
                                        'value_key' => 'name',
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <div class="mb-0 mb-md-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\iclab\resources\views/layouts/admin/pages/products/create.blade.php ENDPATH**/ ?>