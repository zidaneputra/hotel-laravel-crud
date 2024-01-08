<?php $__env->startSection('title', 'Payment'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card shadow-sm border">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Room</th>
                        <th scope="col">Paid Off</th>
                        <th scope="col">Status</th>
                        <th scope="col">At</th>
                        <th scope="col">Served By</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e(($payments->currentpage() - 1) * $payments->perpage() + $loop->index + 1); ?>

                            </th>
                            <td><?php echo e($payment->transaction->room->number); ?></td>
                            <td><?php echo e(Helper::convertToRupiah($payment->price)); ?></td>
                            <td><?php echo e($payment->status); ?></td>
                            <td><?php echo e(Helper::dateFormatTime($payment->created_at)); ?></td>
                            <td><?php echo e($payment->user->name); ?></td>
                            <td> <a href="<?php echo e(route('payment.invoice', $payment->id)); ?>">Invoice</a> </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-center">
                            <td colspan="6">Theres no payment found on database</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/payment/index.blade.php ENDPATH**/ ?>