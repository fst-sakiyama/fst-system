

<?php $__env->startSection('title','有給取得確認'); ?>

<?php $__env->startSection('pageCss'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/css/paid-leave.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.common.head_livewire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.paid_leave.paid_leave_index',['items'=>$items,'paidLeave'=>$paidLeave], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('pageJs'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/add_jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/add_linkTable.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.common.footer_livewire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.system_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fst-system\resources\views/paid_leave/index.blade.php ENDPATH**/ ?>