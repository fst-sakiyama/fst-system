

<?php $__env->startSection('title','要望板｜完了済'); ?>

<?php echo $__env->make('components.common.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.system_top.system_top_docomp_show',['requestClassifications'=>$requestClassifications,'items'=>$items], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('pageJs'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/add_jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/add_replyOpen.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.system_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fst-system\resources\views/system_top/docomp_show.blade.php ENDPATH**/ ?>