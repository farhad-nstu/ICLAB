     <!-- ========== Left Sidebar Start ========== -->
     <div class="vertical-menu">

         <div data-simplebar class="h-100">

             <!--- Sidemenu -->
             <div id="sidebar-menu">

                 <!-- Left Menu Start -->
                 <ul class="metismenu list-unstyled" id="side-menu">
                     <li class="menu-title" key="t-menu">Menu</li>

                     <li class="<?php echo e(request()->path() ? 'mm-active' : ''); ?>">
                         <a href="<?php echo e(url('admin/dashboard')); ?>" class="waves-effect">
                             <i class='bx bxs-dashboard'></i>
                             <span key="t-dashboard">Dashboard</span>
                         </a>
                     </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['products.index', 'products.create', 'products.edit'], 'admin')): ?>
                         <li>
                             <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class='fas fa-users'></i>
                                 <span key="t-multi-level">Products</span>
                             </a>
                             <ul class="sub-menu" aria-expanded="true">
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.index')): ?>
                                     <li><a href="<?php echo e(route('products.index')); ?>"><?php echo e(__('Products List')); ?></a>
                                     </li>
                                 <?php endif; ?>
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.create')): ?>
                                     <li><a href="<?php echo e(route('products.create')); ?>"><?php echo e(__('Create Product')); ?></a>
                                     </li>
                                 <?php endif; ?>
                             </ul>
                         </li>
                     <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['categories.index', 'categories.create'], 'admin')): ?>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class='fas fa-users'></i>
                                <span key="t-multi-level">Category</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.index')): ?>
                                    <li><a href="<?php echo e(route('categories.index')); ?>"><?php echo e(__('Category List')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.create')): ?>
                                    <li><a href="<?php echo e(route('categories.create')); ?>"><?php echo e(__('Create New')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role.show', 'role.create'], 'admin')): ?>
                         <li>
                             <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class='bx bx-accessibility'></i>
                                 <span key="t-multi-level">Roles</span>
                             </a>
                             <ul class="sub-menu" aria-expanded="true">
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.show')): ?>
                                     <li><a href="<?php echo e(route('role.index')); ?>"><?php echo e(__('Role List')); ?></a>
                                     </li>
                                 <?php endif; ?>
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.create')): ?>
                                     <li><a href="<?php echo e(route('role.create')); ?>"><?php echo e(__('Create Role')); ?></a>
                                     </li>
                                 <?php endif; ?>
                             </ul>
                         </li>
                         <li>
                             <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class='bx bx-accessibility'></i>
                                 <span key="t-multi-level">Permission</span>
                             </a>
                             <ul class="sub-menu" aria-expanded="true">
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.show')): ?>
                                     <li><a href="<?php echo e(route('permission.index')); ?>"><?php echo e(__('Permission List')); ?></a>
                                     </li>
                                 <?php endif; ?>
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.create')): ?>
                                     <li><a href="<?php echo e(route('permission.create')); ?>"><?php echo e(__('Create Permission')); ?></a>
                                     </li>
                                 <?php endif; ?>
                             </ul>
                         </li>
                     <?php endif; ?>

                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user.show', 'user.create'], 'web')): ?>
                         <li>
                             <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class='fas fa-users'></i>
                                 <span key="t-multi-level">Users</span>
                             </a>
                             <ul class="sub-menu" aria-expanded="true">
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.show')): ?>
                                     <li><a href="<?php echo e(route('user.index')); ?>"><?php echo e(__('User List')); ?></a>
                                     </li>
                                 <?php endif; ?>
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
                                     <li><a href="<?php echo e(route('user.create')); ?>"><?php echo e(__('Create User')); ?></a>
                                     </li>
                                 <?php endif; ?>
                             </ul>
                         </li>
                     <?php endif; ?>


                 </ul>
             </div>
             <!-- Sidebar -->
         </div>
     </div>
     <!-- Left Sidebar End -->
<?php /**PATH C:\xampp\htdocs\iclab\resources\views/layouts/admin/inc/navbar.blade.php ENDPATH**/ ?>