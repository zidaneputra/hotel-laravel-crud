<?php $__env->startSection('title', 'User'); ?>
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('style/css/progress-indication.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('transaction.reservation.progressbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-3">
        <div class="row justify-content-md-center mt-4 my-3">
            <div class="col-lg-8 ">
            <form class="d-flex" method="GET" action="<?php echo e(route('transaction.reservation.pickFromCustomer')); ?>">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-user"
                        name="q" value="<?php echo e(request()->input('q')); ?>">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <?php if(!empty(request()->input('q'))): ?>
                    <h4>Result for "<?php echo e(request()->input('q')); ?>"</h4>
                    <h4>Total Data: <?php echo e($customersCount); ?></h4>
                <?php endif; ?>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-sm-10 d-flex mx-auto justify-content-md-center">
                <div class="pagination-block">
                    <?php echo e($customers->onEachSide(1)->links('template.paginationlinks')); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 my-1">
                    <div class="card shadow-sm justify-content-start" style="min-height:350px; ">
                        <img class="myImages" src="<?php echo e($customer->user->getAvatar()); ?>"
                            style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5 class="mt-0"><?php echo e($customer->name); ?>

                                                </h5>
                                                <div class="table-responsive">
                                                    <table>
                                                        <tr>
                                                            <td><i class="fas fa-envelope"></i></td>
                                                            <td>
                                                                <span>
                                                                    <?php echo e($customer->user->email); ?>

                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-user-md"></i></td>
                                                            <td>
                                                                <span>
                                                                    <?php echo e($customer->job); ?>

                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-map-marker-alt"></i></td>
                                                            <td style="white-space:nowrap" class="overflow-hidden">
                                                                <span>
                                                                    <?php echo e($customer->address); ?>

                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-phone"></i></td>
                                                            <td>
                                                                <span>
                                                                    +6281233808395
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-birthday-cake"></i></td>
                                                            <td>
                                                                <span>
                                                                    <?php echo e($customer->birthdate); ?>

                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <a href="<?php echo e(route('transaction.reservation.viewCountPerson', ['customer' => $customer->id])); ?>"
                                            class="btn btn-primary">Choose</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-sm-10 d-flex mx-auto justify-content-md-center">
                <div class="pagination-block">
                    <?php echo e($customers->onEachSide(1)->links('template.paginationlinks')); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/transaction/reservation/pickFromCustomer.blade.php ENDPATH**/ ?>