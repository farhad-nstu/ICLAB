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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr class="table-hd-bg">
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount (%)</th>
                                <th>Discount Price</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td><?php echo e($product->category->name); ?></td>
                                    <td><?php echo e($product->price); ?></td>
                                    <td><?php echo e($product->discount); ?></td>
                                    <td><?php echo e(discountPrice($product->price, $product->discount)); ?></td>
                                    <td><?php echo e($product->status); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.edit')): ?>
                                            <a href="<?php echo e(route('products.edit', $product->id)); ?>"
                                                class="btn btn-primary waves-effect waves-light"><i class="fas fa-edit"></i></a>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo e($products->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\iclab\resources\views/layouts/admin/pages/products/index.blade.php ENDPATH**/ ?>