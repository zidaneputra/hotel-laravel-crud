<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(asset('img/logo/sip.png')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>

<body>
    <main>
        <div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</body>

</html>
<?php /**PATH /Users/zidane/Downloads/Laravel-Hotel-main/resources/views/template/auth.blade.php ENDPATH**/ ?>