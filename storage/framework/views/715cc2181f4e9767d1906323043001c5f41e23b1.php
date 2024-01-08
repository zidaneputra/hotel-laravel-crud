<form id="form-save-room" class="row g-3" method="POST" action="<?php echo e(route('room.update', ['room' => $room->id])); ?>">
    <?php echo method_field('PUT'); ?>
    <?php echo csrf_field(); ?>
    <div class="col-md-12">
        <label for="type_id" class="form-label">Type</label>
        <select id="type_id" name="type_id" class="form-control select2">
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id); ?>" <?php if($room->type->id == $type->id): ?> selected <?php endif; ?>><?php echo e($type->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <div id="error_type_id" class="text-danger error"></div>
    </div>
    <div class="col-md-12">
        <label for="room_status_id" class="form-label">Room Status</label>
        <select id="room_status_id" name="room_status_id" class="form-control select2">
            <?php $__currentLoopData = $roomstatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($roomstatus->id); ?>" <?php if($room->roomstatus->id == $roomstatus->id): ?> selected <?php endif; ?>>
                    <?php echo e($roomstatus->name); ?> (<?php echo e($roomstatus->code); ?>)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <div id="error_room_status_id" class="text-danger error"></div>
    </div>
    <div class="col-md-12">
        <label for="number" class="form-label">Room Number</label>
        <input room="text" class="form-control <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="number" name="number"
            value="<?php echo e($room->number); ?>" placeholder="ex: 1A">
        <div id="error_number" class="text-danger error"></div>
    </div>
    <div class="col-md-12">
        <label for="capacity" class="form-label">Capacity</label>
        <input room="text" class="form-control <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="capacity"
            name="capacity" value="<?php echo e($room->capacity); ?>" placeholder="ex: 4">
        <div id="error_capacity" class="text-danger error"></div>
    </div>
    <div class="col-md-12">
        <label for="price" class="form-label">Price</label>
        <input room="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="price" name="price"
            value="<?php echo e($room->price); ?>" placeholder="ex: 500000">
        <div id="error_price" class="text-danger error"></div>
    </div>
    <div class="col-md-12">
        <label for="view" class="form-label">View</label>
        <textarea class="form-control" id="view" name="view" rows="3" placeholder="ex: window see beach"><?php echo e($room->view); ?></textarea>
        <div id="error_view" class="text-danger error"></div>
    </div>
</form>
<?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/room/edit.blade.php ENDPATH**/ ?>