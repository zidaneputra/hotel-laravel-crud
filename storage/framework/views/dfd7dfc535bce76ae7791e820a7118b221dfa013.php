<?php $__env->startSection('title', 'Room'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3">
            <?php if(!empty($customer)): ?>
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
                </div>
            </div>
            <?php else: ?>
            <div class="card">
                <div class="card-body">
                    <h4>Currently Empty</h4>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-5 mb-3">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-between">
                            <h3><?php echo e($room->number); ?> </h3>
                            <button type="button" class="btn btn-sm shadow-sm myBtn border rounded" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Upload Image
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p>
                                                Capacity: <?php echo e($room->capacity); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row row-col-2 row-cols-lg-3 g-3">
                <?php $__empty_1 = true; $__currentLoopData = $room->image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col">
                        <div class="card shadow-sm border">
                            <img src="<?php echo e($image->getRoomImage()); ?>" alt=""
                                style="object-fit: cover; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;"
                                height="250">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="<?php echo e(route('image.destroy', ['image' => $image->id])); ?>"
                                            method="POST">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="btn btn-sm shadow-sm myBtn border rounded">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Theres no image for this room</h4>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('image.store', ['room' => $room->id])); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image" id="inputGroupFile02">
                            <button class="input-group-text" type="submit" for="inputGroupFile02">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <script>
            toastr.error("<?php echo e($message); ?>", "Failed");

        </script>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/room/show.blade.php ENDPATH**/ ?>