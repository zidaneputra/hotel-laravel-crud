<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <link rel="icon" href="<?php echo e(asset('img/logo/sip.png')); ?>">
    
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>
    <header>
        <?php echo $__env->make('template.include._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <main class="my-3">
        <!-- Modal -->
        <div class="modal fade" id="main-modal" tabindex="-1" aria-labelledby="main-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button id="btn-modal-close" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button id="btn-modal-save" type="button" class="btn btn-primary text-white">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->

            <!-- /#sidebar-wrapper -->
            <?php echo $__env->make('template.include._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="">
                    <div class="container-fluid">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
                
            </div>
            <!-- /#page-content-wrapper -->

        </div>
    </main>
    <footer class="footer mt-auto py-2 shadow-sm border-top mt-3" style="background: #f8f9fa; height:55px">
        <?php echo $__env->make('template.include._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <?php echo $__env->yieldContent('footer'); ?>
</body>

</html>
<?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/template/master.blade.php ENDPATH**/ ?>