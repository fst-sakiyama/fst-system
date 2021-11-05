

<?php $__env->startSection('title','シフト表'); ?>

<?php echo $__env->make('components.common.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.shift_table.shift_table_index',['dates'=>$dates,'items'=>$items,'holidays'=>$holidays,'calendar'=>$calendar,'firstDay'=>$firstDay], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('pageJs'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/add_jquery.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.system_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fst-system\resources\views/shift_table/index.blade.php ENDPATH**/ ?>