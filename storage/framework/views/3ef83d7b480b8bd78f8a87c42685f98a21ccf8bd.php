

<?php $__env->startSection('title','勤務表'); ?>

<?php echo $__env->make('components.common.head_livewire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.work_table.work_table_index',['userId'=>$userId,'status'=>$status,'dates'=>$dates,'items'=>$items,'holidays'=>$holidays,'calendar'=>$calendar,'firstDay'=>$firstDay,'nonOpe'=>$nonOpe], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('pageJs'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/add_jquery.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.common.footer_livewire', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.system_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fst-system\resources\views/work_table/index.blade.php ENDPATH**/ ?>