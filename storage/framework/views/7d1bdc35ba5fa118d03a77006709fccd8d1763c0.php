<nav class="navbar navbar-expand navbar-light px-1 bg-white shadow-sm fixed-top" style="height: 55px">
    <div class="container-fluid">
        <div id="menu-toggle" class="p-2 border rounded d-flex justify-content-center align-items-center cursor-pointer"
            style="width: 2rem; height: 2rem;">
            <i class="fa fa-bars"></i>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="dropdown ms-auto me-4" id="refreshThisDropdown">
                <div class="dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="btn position-relative bg-icon">
                        <i class="fas fa-bell">
                            <?php if(auth()->user()->unreadNotifications->count() > 0): ?>
                                <span
                                    class="position-absolute mt-1 top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                                    <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            <?php endif; ?>
                        </i>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                    <div class="row">
                        <div class="col-lg-12">
                            <li role="presentation">
                                <div class="dropdown-header">Notifications</div>
                            </li>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="timeline timeline-icons timeline-sm p-2"
                                style="width:210px; max-height:300px; overflow:auto">
                                <?php $__empty_1 = true; $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li>
                                        <p>
                                            <?php echo e($notification->data['message']); ?>

                                            <a
                                                href="<?php echo e(route('notification.routeTo', ['id' => $notification->id])); ?>">here</a>
                                            
                                            <span class="timeline-icon" style="margin-left: -1px; margin-top:-3px"><i
                                                    class="fa fa-cash-register"></i></span>
                                            <span
                                                class="timeline-date"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                                        </p>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p class="text-center">
                                        There's no new notification
                                    </p>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <li role="presentation">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <a href="<?php echo e(route('notification.markAllAsRead')); ?>"
                                            class="float-start mb-2 ms-2">Mark all as read</a>
                                        <a href="<?php echo e(route('notification.index')); ?>" class="float-end mb-2 me-2">See
                                            All</a>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
                </ul>

            </div>
            <div class="dropdown">
                <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo e(auth()->user()->getAvatar()); ?>" class="rounded-circle img-thumbnail"
                        style="cursor: pointer" width="40" height="40" alt="">
                </div>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item"
                            href="<?php echo e(route('user.show', ['user' => auth()->user()->id])); ?>">Profil</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Activity</a></li>
                    <li><a class="dropdown-item" href="#">Setting</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <form action="/logout" method="POST">
                        <?php echo csrf_field(); ?>
                        <li><button class="dropdown-item" type="submit">Logout</button></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/template/include/_navbar.blade.php ENDPATH**/ ?>