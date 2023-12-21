
<?php $__env->startSection('title', 'Permission List'); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .avatar-xl {
            height: 2.5rem;
            width: 2.5rem;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-12">
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
                                <a href="<?php echo e(route('permission.create')); ?>"
                                    class="btn btn-primary waves-effect waves-light">Create
                                    New</a>
                            </div>
                        </div>
                    </div>
                </div>
             
                <div class="card-body table-responsive ">
                    <table class="table table-bordered table-striped  w-100">
                        <thead>
                            <tr class="text-center table-hd-bg">
                                <th>#</th>
                                <th>Permission Name</th>
                                <th>Group Name</th>
                                <th>Guard Name</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td><?php echo e($permission->name); ?></td>
                                <td><?php echo e($permission->group_name); ?></td>
                                <td><?php echo e($permission->guard_name); ?></td>
                                <td> 
                                    <a href="<?php echo e(route('permission.edit', $permission->id)); ?>" class="btn btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                       
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                        <?php echo e($permissions->links()); ?>

                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\iclab\resources\views/layouts/admin/pages/permission/index.blade.php ENDPATH**/ ?>