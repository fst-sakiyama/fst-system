<?php $__env->startSection('content'); ?>

<?php
    function table_class($dt,$int){
        if($int >= 10){ return '';}
        $today = \Carbon\Carbon::today();
        $future = $dt->copy()->addYear()->subDay();
        $diff = $today->diffInDays($future);
        if($diff <= 30){
            return 'table-danger';
        }elseif($diff <= 60){
            return 'table-warning';
        }elseif($diff <= 90){
            return 'table-info';
        }else{
            return '';
        }
    }
?>

<div class="contents">
  <div class="container container-top">
    <h1><?php echo $__env->make('components.returnButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col h5">
                    有給取得確認
                </div>
                <div class="col text-right">
                    <a href="<?php echo e(route('paid_leave.create')); ?>"><div class="btn btn-sm btn-primary">取得日の更新</div></a>
                </div>
            </div>
        </div>

        <table class="table table-sm">
          <thead>
            <tr>
              <th style="width:20%;">名前</th>
              <th style="width:30%;">有給付与日</th>
              <th style="width:50%;">有給消化状況</th>
            </tr>
          </thead>

            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
              <?php if($item->role != '1' && isset($item->dispPaidLeave)): ?>
                <?php $id = $item->userId; ?>
                <tr>
                    <td rowspan="2"><?php echo e($item->employee->name); ?></td>
                    <td><?php echo e(isset($paidLeave[$id][0]) ? $paidLeave[$id][0]->format('Y-m-d') : '-'); ?></td>
                    <td>
                        <?php if(isset($paidLeave[$id][1])): ?>
                            <div class="thumbnails">
                            <?php for($i = 1; $i <= $paidLeave[$id][1]; $i++): ?>
                                <?php if($i % 2 == 0): ?>
                                    <img class="thumbnail" alt="取得済" src="<?php echo e(asset('images/color_right.png')); ?>" height="26px">
                                <?php else: ?>
                                    <img class="thumbnail" alt="取得済" src="<?php echo e(asset('images/color_left.png')); ?>" height="26px">
                                <?php endif; ?>
                            <?php endfor; ?>
                            <?php for($i = $paidLeave[$id][1] + 1; $i <= 10; $i++): ?>
                                <?php if($i % 2 == 0): ?>
                                    <img class="thumbnail" alt="未取得" src="<?php echo e(asset('images/mono_right.png')); ?>" height="26px">
                                <?php else: ?>
                                    <img class="thumbnail" alt="未取得" src="<?php echo e(asset('images/mono_left.png')); ?>" height="26px">
                                <?php endif; ?>
                            <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <?php $class = isset($paidLeave[$id][2]) ? table_class($paidLeave[$id][2],$paidLeave[$id][3]) : '' ; ?>
                    <td class='<?php echo e($class); ?>'><?php echo e(isset($paidLeave[$id][2]) ? $paidLeave[$id][2]->format('Y-m-d') : '-'); ?></td>
                    <td class='<?php echo e($class); ?>'>
                        <?php if(isset($paidLeave[$id][3])): ?>
                            <div class="thumbnails">
                            <?php for($i = 1; $i <= $paidLeave[$id][3]; $i++): ?>
                                <?php if($i % 2 == 0): ?>
                                    <img class="thumbnail" alt="取得済" src="<?php echo e(asset('images/color_right.png')); ?>" height="26px">
                                <?php else: ?>
                                    <img class="thumbnail" alt="取得済" src="<?php echo e(asset('images/color_left.png')); ?>" height="26px">
                                <?php endif; ?>
                            <?php endfor; ?>
                            <?php for($i = $paidLeave[$id][3] + 1; $i <= 10; $i++): ?>
                                <?php if($i % 2 == 0): ?>
                                    <img class="thumbnail" alt="未取得" src="<?php echo e(asset('images/mono_right.png')); ?>" height="26px">
                                <?php else: ?>
                                    <img class="thumbnail" alt="未取得" src="<?php echo e(asset('images/mono_left.png')); ?>" height="26px">
                                <?php endif; ?>
                            <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
              <?php endif; ?>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/paid_leave/paid_leave_index.blade.php ENDPATH**/ ?>