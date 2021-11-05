<div>
    <td><?php echo e(Form::checkbox('dispPaidLeave',1,$dispPaidleave,['class'=>'custom-controller','id'=>'dispPaidLeave'.$userId])); ?></td>
    <td><?php echo e($name); ?></td>
    <td>
        <div id="grantDateBlock<?php echo e($userId); ?>" class="">
            <?php echo e($grantDate); ?>

        </div>
        <div id="grantDateFormBlock<?php echo e($userId); ?>" class="form-group form-inline d-none">
            <?php echo e(Form::date('grantDate',$grantDate,['id'=>'grantDate'.$userId,'class'=>'form-control-sm custom-control','min'=>$minDate])); ?>

        </div>
    </td>
    <td>
        <button class="btn btn-sm btn-success py-0" id='correct<?php echo e($userId); ?>'>修正</button>
        <button class="btn btn-sm btn-warning py-0 d-none" id='edit<?php echo e($userId); ?>'>実行</button>
    </td>
</div>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/livewire/paid-leave-set.blade.php ENDPATH**/ ?>