<?php $__env->startSection('title', 'Customer'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .mybg {
            background-image: linear-gradient(#1975d1, #1975d1);
        }

        .numbering {
            width: 50px;
            height: 50px;
            align-items: center;
            justify-content: center;
            padding-top: 12px;
            text-align: center;
            border-bottom-right-radius: 30px;
            border-top-left-radius: 5px;
        }

        .icon {
            font-size: 1.5rem;
            margin-right: -10px;
            color: #212529
        }

    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-2 mb-2">
                <div class="col-lg-6 mb-2">
                    <a href="<?php echo e(route('customer.create')); ?>" class="btn btn-sm shadow-sm myBtn border rounded">
                        <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="black">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </a>
                </div>
                <div class="col-lg-6 mb-2">
                    <form class="d-flex" method="GET" action="<?php echo e(route('customer.index')); ?>">
                        <input class="form-control me-2" type="search" placeholder="Search by name" aria-label="Search" id="search"
                            name="search" value="<?php echo e(request()->input('search')); ?>">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-2 col-md-4 col-sm-6 my-1">
                        <div class="card shadow-sm justify-content-start p-0 rounded" style="min-height:350px; ">
                            <div class="row w-100" style="position:absolute;">
                                <div class="d-flex">
                                    <h5 class="card-title text-white numbering bg-dark ">
                                        <?php echo e(($customers->currentpage() - 1) * $customers->perpage() + $loop->index + 1); ?>

                                    </h5>
                                    <div class="dropdown ms-auto mt-2" style="">
                                        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v icon"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item"
                                                    href="<?php echo e(route('customer.show', ['customer' => $customer->id])); ?>">Detail</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo e(route('customer.edit', ['customer' => $customer->id])); ?>">Edit</a>
                                            </li>
                                            <li>
                                                <form method="POST" id="delete-customer-form-<?php echo e($customer->id); ?>"
                                                    action="<?php echo e(route('customer.destroy', ['customer' => $customer->id])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <a class="dropdown-item delete" href="#" customer-id="<?php echo e($customer->id); ?>"
                                                        customer-role="Customer" customer-name="<?php echo e($customer->name); ?>">
                                                        Delete
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <img src="<?php echo e($customer->user->getAvatar()); ?>"
                                style="object-fit: cover; height:350px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
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
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center">There's no customer found on database</p>
                <?php endif; ?>
            </div>
            <div class="row justify-content-md-center mt-3">
                <div class="col-sm-10 d-flex justify-content-md-center">
                    <?php echo e($customers->onEachSide(2)->links('template.paginationlinks')); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    $('.delete').click(function() {
        var customer_id = $(this).attr('customer-id');
        var customer_name = $(this).attr('customer-name');
        var customer_url = $(this).attr('customer-url');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: customer_name + " will be deleted, You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel! ',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                id = "#delete-customer-form-" + customer_id
                console.log(id)
                $(id).submit();
            }
        })
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/customer/index.blade.php ENDPATH**/ ?>