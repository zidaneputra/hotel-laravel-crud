<?php $__env->startSection('title', 'Reservation'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mt-2 mb-2">
        <div class="col-lg-6 mb-2">
            <div class="d-grid gap-2 d-md-block">
                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Add Room Reservation">
                    <button type="button" class="btn btn-sm shadow-sm myBtn border rounded" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="fas fa-plus"></i>
                    </button>
                </span>
                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Payment History">
                    <a href="<?php echo e(route('payment.index')); ?>" class="btn btn-sm shadow-sm myBtn border rounded">
                        <i class="fas fa-history"></i>
                    </a>
                </span>
            </div>
        </div>
        <div class="col-lg-6 mb-2">
            <form class="d-flex" method="GET" action="<?php echo e(route('transaction.index')); ?>">
                <input class="form-control me-2" type="search" placeholder="Search by ID" aria-label="Search"
                    id="search-user" name="search" value="<?php echo e(request()->input('search')); ?>">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row my-2 mt-4 ms-1">
        <div class="col-lg-12">
            <h5>Active Guests: </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Room</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Days</th>
                                    <th>Total Price</th>
                                    <th>Paid Off</th>
                                    <th>Debt</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <th><?php echo e(($transactions->currentpage() - 1) * $transactions->perpage() + $loop->index + 1); ?>

                                        </th>
                                        <td><?php echo e($transaction->id); ?></td>
                                        <td><?php echo e($transaction->customer->name); ?></td>
                                        <td><?php echo e($transaction->room->number); ?></td>
                                        <td><?php echo e(Helper::dateFormat($transaction->check_in)); ?></td>
                                        <td><?php echo e(Helper::dateFormat($transaction->check_out)); ?></td>
                                        <td><?php echo e($transaction->getDateDifferenceWithPlural($transaction->check_in, $transaction->check_out)); ?>

                                        </td>
                                        <td><?php echo e(Helper::convertToRupiah($transaction->getTotalPrice())); ?>

                                        </td>
                                        <td>
                                            <?php echo e(Helper::convertToRupiah($transaction->getTotalPayment())); ?>

                                        </td>
                                        <td><?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? '-' : Helper::convertToRupiah($transaction->getTotalPrice() - $transaction->getTotalPayment())); ?>

                                        </td>
                                        <td>
                                            <a class="btn btn-light btn-sm rounded shadow-sm border p-1 m-0 <?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? 'disabled' : ''); ?>"
                                                href="<?php echo e(route('transaction.payment.create', ['transaction' => $transaction->id])); ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">
                                                <i class="fas fa-money-bill-wave-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="15" class="text-center">
                                            There's no data in this table
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo e($transactions->onEachSide(2)->links('template.paginationlinks')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2 mt-4 ms-1">
        <div class="col-lg-12">
            <h5>Expired: </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Room</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Days</th>
                                    <th>Total Price</th>
                                    <th>Paid Off</th>
                                    <th>Debt</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $transactionsExpired; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th><?php echo e(($transactions->currentpage() - 1) * $transactions->perpage() + $loop->index + 1); ?>

                                    </th>
                                    <td><?php echo e($transaction->id); ?></td>
                                    <td><?php echo e($transaction->customer->name); ?></td>
                                    <td><?php echo e($transaction->room->number); ?></td>
                                    <td><?php echo e(Helper::dateFormat($transaction->check_in)); ?></td>
                                    <td><?php echo e(Helper::dateFormat($transaction->check_out)); ?></td>
                                    <td><?php echo e($transaction->getDateDifferenceWithPlural($transaction->check_in, $transaction->check_out)); ?>

                                    </td>
                                    <td><?php echo e(Helper::convertToRupiah($transaction->getTotalPrice())); ?>

                                    </td>
                                    <td>
                                        <?php echo e(Helper::convertToRupiah($transaction->getTotalPayment())); ?>

                                    </td>
                                    <td><?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? '-' : Helper::convertToRupiah($transaction->getTotalPrice($transaction->room->price, $transaction->check_in, $transaction->check_out) - $transaction->getTotalPayment())); ?>

                                    </td>
                                    <td>
                                        <a class="btn btn-light btn-sm rounded shadow-sm border p-1 m-0 <?php echo e($transaction->getTotalPrice($transaction->room->price, $transaction->check_in, $transaction->check_out) - $transaction->getTotalPayment() <= 0 ? 'disabled' : ''); ?>"
                                            href="<?php echo e(route('transaction.payment.create', ['transaction' => $transaction->id])); ?>"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">
                                            <i class="fas fa-money-bill-wave-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="15" class="text-center">
                                        There's no data in this table
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo e($transactions->onEachSide(2)->links('template.paginationlinks')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Have any account?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-sm btn-primary m-1"
                            href="<?php echo e(route('transaction.reservation.createIdentity')); ?>">No, create
                            new account!</a>
                        <a class="btn btn-sm btn-success m-1"
                            href="<?php echo e(route('transaction.reservation.pickFromCustomer')); ?>">Yes, use
                            their account!</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/transaction/index.blade.php ENDPATH**/ ?>