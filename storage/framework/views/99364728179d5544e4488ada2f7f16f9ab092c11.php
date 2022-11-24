<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet preload" as="style" href="<?php echo e(asset('front/css/preload.min.css')); ?>" />
    <link rel="stylesheet preload" as="style" href="<?php echo e(asset('front/css/icomoon.css')); ?>" />
    <link rel="stylesheet preload" as="style" href="<?php echo e(asset('front/css/libs.min.css')); ?>" />
<?php echo $__env->yieldPushContent('css'); ?>
</head>
<body>
<header class="header d-flex flex-wrap align-items-center" data-page="<?php echo $__env->yieldContent('data-page'); ?>" data-overlay="@overlay">
    <?php echo $__env->make('front.partials.menu-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</header>

<?php echo $__env->yieldContent('content'); ?>

<footer class="footer">
    <?php echo $__env->make('front.partials.footer-main-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('front.partials.footer-secondary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>
<?php echo $__env->make('front.partials.cart-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('front/js/common.min.js')); ?>"></script>
<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/front/layouts/app1.blade.php ENDPATH**/ ?>