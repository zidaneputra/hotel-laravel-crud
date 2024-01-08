<?php $__env->startSection('title', 'User'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3><?php echo e($user->name); ?></h3>
            </div>
            <div class="card-body">
                <div class="row g-0 bg-light position-relative">
                    <div class="col-md-4 mb-md-0 p-md-4">
                        <img src="<?php echo e($user->getAvatar()); ?>" class="w-100" alt="...">
                    </div>
                    <div class="col-md-8 p-4 ps-md-0">
                        <h5 class="mt-0"><?php echo e($user->email); ?></h5>
                        <p> <?php echo e($user->role); ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/user/show.blade.php ENDPATH**/ ?>