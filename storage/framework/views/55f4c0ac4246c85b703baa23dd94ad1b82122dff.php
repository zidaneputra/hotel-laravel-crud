<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div id="dashboard">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card shadow-sm border" style="border-radius: 0.5rem">
                            <div class="card-body">
                                <h5><?php echo e(count($transactions)); ?> Guests this day</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow-sm border" style="border-radius: 0.5rem">
                            <div class="card-body text-center">
                                <h5>Dashboard</h5>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box border -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <h3>Today Guests</h3>
                                        <div>
                                            <a href="#" class="btn btn-tool btn-sm">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" class="btn btn-tool btn-sm">
                                                <i class="fas fa-bars"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Room</th>
                                            <th class="text-center">Stay</th>
                                            <th>Day Left</th>
                                            <th>Debt</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e($transaction->customer->user->getAvatar()); ?>"
                                                        class="rounded-circle img-thumbnail" width="40" height="40"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <a
                                                        href="<?php echo e(route('customer.show', ['customer' => $transaction->customer->id])); ?>">
                                                        <?php echo e($transaction->customer->name); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('room.show', ['room' => $transaction->room->id])); ?>">
                                                        <?php echo e($transaction->room->number); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo e(Helper::dateFormat($transaction->check_in)); ?> ~
                                                    <?php echo e(Helper::dateFormat($transaction->check_out)); ?>

                                                </td>
                                                <td><?php echo e(Helper::getDateDifference(now(), $transaction->check_out) == 0 ? 'Last Day' : Helper::getDateDifference(now(), $transaction->check_out) . ' ' . Helper::plural('Day', Helper::getDateDifference(now(), $transaction->check_out))); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? '-' : Helper::convertToRupiah($transaction->getTotalPrice() - $transaction->getTotalPayment())); ?>

                                                </td>
                                                <td>
                                                    <span
                                                        class="justify-content-center badge <?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() == 0 ? 'bg-success' : 'bg-warning'); ?>">
                                                        <?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() == 0 ? 'Success' : 'Progress'); ?>

                                                    </span>
                                                    <?php if(Helper::getDateDifference(now(), $transaction->check_out) < 1): ?>
                                                        <span class="justify-content-center badge bg-danger">
                                                            must finish payment
                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    There's no data in this table
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Monthly Guests Chart</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="d-flex flex-column">
                                        
                                        
                                    </p>
                                    
                                </div>
                                <div class="position-relative mb-4">
                                    <canvas this-year="<?php echo e(Helper::thisYear()); ?>" this-month="<?php echo e(Helper::thisMonth()); ?>"
                                        id="visitors-chart" height="400" width="100%" class="chartjs-render-monitor"
                                        style="display: block; width: 249px; height: 200px;"></canvas>
                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> <?php echo e(Helper::thisMonth()); ?>

                                    </span>
                                    <span>
                                        <i class="fas fa-square text-gray"></i> Last month
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/dashboard/index.blade.php ENDPATH**/ ?>