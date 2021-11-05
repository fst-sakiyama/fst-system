<?php $__env->startSection('head'); ?>
<meta charset="UTF-8">
<title><?php echo $__env->yieldContent('title'); ?></title>
<meta name="description" itemprop="description" content="<?php echo $__env->yieldContent('description'); ?>">
<meta name="keywords" itemprop="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<!--CSS
<link rel="stylesheet" type ="text/css" href="<?php echo e(asset('/css/app.css')); ?>">
-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/css/calendar.css')); ?>">

<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

<?php echo $__env->yieldContent('pageCss'); ?>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/common/head.blade.php ENDPATH**/ ?>