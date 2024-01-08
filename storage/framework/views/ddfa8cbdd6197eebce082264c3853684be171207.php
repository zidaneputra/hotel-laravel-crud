<?php $__env->startSection('title', 'Choose Day Reservation'); ?>
<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('style/css/progress-indication.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('transaction.reservation.progressbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-md-8 mt-2">
                <div class="card shadow-sm border">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row mb-3">
                                    <label for="room_number" class="col-sm-2 col-form-label">Room</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_number" name="room_number"
                                            placeholder="col-form-label" value="<?php echo e($room->number); ?> " readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="room_type" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_type" name="room_type"
                                            placeholder="col-form-label" value="<?php echo e($room->type->name); ?> " readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="room_capacity" class="col-sm-2 col-form-label">Capacity</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_capacity" name="room_capacity"
                                            placeholder="col-form-label" value="<?php echo e($room->capacity); ?> " readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="room_price" class="col-sm-2 col-form-label">Price / Day</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_price" name="room_price"
                                            placeholder="col-form-label"
                                            value="<?php echo e(Helper::convertToRupiah($room->price)); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12 mt-2">
                                <form method="POST"
                                    action="<?php echo e(route('transaction.reservation.payDownPayment', ['customer' => $customer->id, 'room' => $room->id])); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row mb-3">
                                        <label for="check_in" class="col-sm-2 col-form-label">Check In</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="check_in" name="check_in"
                                                placeholder="col-form-label" value="<?php echo e($stayFrom); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="check_out" name="check_out"
                                                placeholder="col-form-label" value="<?php echo e($stayUntil); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="how_long" class="col-sm-2 col-form-label">Total Day</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="how_long" name="how_long"
                                                placeholder="col-form-label"
                                                value="<?php echo e($dayDifference); ?> <?php echo e(Helper::plural('Day', $dayDifference)); ?> "
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="total_price" class="col-sm-2 col-form-label">Total Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="total_price" name="total_price"
                                                placeholder="col-form-label"
                                                value="<?php echo e(Helper::convertToRupiah(Helper::getTotalPayment($dayDifference, $room->price))); ?> "
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="minimum_dp" class="col-sm-2 col-form-label">Minimum DP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="minimum_dp" name="minimum_dp"
                                                placeholder="col-form-label"
                                                value="<?php echo e(Helper::convertToRupiah($downPayment)); ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="downPayment" class="col-sm-2 col-form-label">Payment</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['downPayment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="downPayment" name="downPayment" placeholder="Input payment here"
                                                value="<?php echo e(old('downPayment')); ?>">
                                            <?php $__errorArgs = ['downPayment'];
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
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10" id="showPaymentType"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Pay DownPayment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card shadow-sm">
                    <img src="<?php echo e($customer->user->getAvatar()); ?>"
                        style="border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td style="text-align: center; width:50px">
                                    <span>
                                        <i class="fas <?php echo e($customer->gender == 'Male' ? 'fa-male' : 'fa-female'); ?>">
                                        </i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($customer->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-user-md"></i>
                                    </span>
                                </td>
                                <td><?php echo e($customer->job); ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-birthday-cake"></i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($customer->birthdate); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($customer->address); ?>

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
    $('#downPayment').keyup(function() {
        $('#showPaymentType').text('Rp. ' + parseFloat($(this).val(), 10).toFixed(2).replace(
                /(\d)(?=(\d{3})+\.)/g, "$1.")
            .toString());
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/transaction/reservation/confirmation.blade.php ENDPATH**/ ?>