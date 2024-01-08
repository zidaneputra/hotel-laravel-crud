<?php $__env->startSection('title', $transaction->customer->name . ' Pay Reservation'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class=" col-sm-2 col-form-label">Room</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo e($transaction->room->number); ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Check In</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                    value="<?php echo e(Helper::dateFormat($transaction->check_in)); ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Check Out</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                    value="<?php echo e(Helper::dateFormat($transaction->check_out)); ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class=" col-sm-2 col-form-label">Room Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                    value="<?php echo e(Helper::convertToRupiah($transaction->room->price)); ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Days Count</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                    value="<?php echo e($transaction->getDateDifferenceWithPlural($transaction->check_in, $transaction->check_out)); ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Total Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                    value="<?php echo e(Helper::convertToRupiah($transaction->getTotalPrice($transaction->room->price, $transaction->check_in, $transaction->check_out))); ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Paid Off</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                    value="<?php echo e(Helper::convertToRupiah($transaction->getTotalPayment())); ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Insufficient</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"
                                    value="<?php echo e(Helper::convertToRupiah($transaction->getTotalPrice($transaction->room->price, $transaction->check_in, $transaction->check_out) - $transaction->getTotalPayment())); ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST"
                                    action="<?php echo e(route('transaction.payment.store', ['transaction' => $transaction->id])); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row mb-3">
                                        <label for="payment" class="col-sm-2 col-form-label">Pay</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php $__errorArgs = ['payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="Input payment" value="" id="payment" name="payment">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10" id="showPaymentType"></div>
                                    </div>
                                    <?php $__errorArgs = ['payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <button class="btn btn-success float-end">Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-2">
                <div class="card shadow-sm">
                    <img src="<?php echo e($transaction->customer->user->getAvatar()); ?>"
                        style="border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td style="text-align: center; width:50px">
                                    <span>
                                        <i
                                            class="fas <?php echo e($transaction->customer->gender == 'Male' ? 'fa-male' : 'fa-female'); ?>">
                                        </i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($transaction->customer->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-user-md"></i>
                                    </span>
                                </td>
                                <td><?php echo e($transaction->customer->job); ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-birthday-cake"></i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($transaction->customer->birthdate); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($transaction->customer->address); ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script>
    $('#payment').keyup(function() {
        $('#showPaymentType').text('Rp. ' + parseFloat($(this).val(), 10).toFixed(2).replace(
                /(\d)(?=(\d{3})+\.)/g, "$1,")
            .toString());
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/transaction/payment/create.blade.php ENDPATH**/ ?>