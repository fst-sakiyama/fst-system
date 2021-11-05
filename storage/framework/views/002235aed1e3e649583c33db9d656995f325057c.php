<?php $__env->startSection('content'); ?>

<?php
  $userName = App\User::find($userId)->name;
  $prevMonth = $firstDay->copy()->subMonth();
  $nextMonth = $firstDay->copy()->addMonth();

  function init_value($str1){
    if(isset($str1)){
      return $str1;
    } else {
      return '-';
    }
  }

  function init_class($str1,$str2){
    if(isset($str1) && $str1 != "null"){
      return "";
    } elseif(isset($str2)){
      return "";
    } else {
      return 'disabled';
    }
  }

  function create_time($str1,$str2){
    if($str1 === '-' || $str2 === '-'){
      return '-';
    } else {
      return sprintf('%02d',$str1).':'.sprintf('%02d',$str2);
    }
  }
?>

<div class="contents">
  <div class="container container-top">
    <div class="row">
      <div class="col text-left">
        <a href="<?php echo e(route('work_table.index',['year'=>$prevMonth->format('Y'),'month'=>$prevMonth->format('m'),'uid'=>$userId])); ?>">
          <i class="fa fa-lg fa-chevron-circle-left" style="color:#65ab31;"><small><?php echo e($prevMonth->format('Y年m月')); ?></small></i>
        </a>
      </div>
      <div class="col text-center">
        <a href="<?php echo e(route('work_table.index',['uid'=>$userId])); ?>">
          <i class="fa fa-lg fa-angle-left" style="color:#65ab31;"><small>当月へ</small></i><i class="fa fa-lg fa-angle-right" style="color:#65ab31;"></i>
        </a>
      </div>
      <div class="col text-right">
        <a href="<?php echo e(route('work_table.index',['year'=>$nextMonth->format('Y'),'month'=>$nextMonth->format('m'),'uid'=>$userId])); ?>">
          <i class="fa fa-lg fa-chevron-circle-right" style="color:#65ab31;"><small><?php echo e($nextMonth->format('Y年m月')); ?></small></i>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 mt-3 ml-5 align-self-center">
        <div class="h3"><?php echo e($firstDay->format('Y年m月')); ?>勤務表　<?php echo e($userName); ?></div>
      </div>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-higher')): ?>
      <div class="col-md-4 align-self-center text-right">
        <a href="<?php echo e(route('work_table.export',['year'=>$firstDay->format('Y'),'month'=>$firstDay->format('m'),'uid'=>$userId])); ?>">
          <div class="btn btn-warning py-0" style="cursor:pointer;"><i class="fa fa-download" aria-hidden="true"></i> 勤務表の出力</div>
        </a>
        <a href="<?php echo e(route('work_table.allExport',['year'=>$firstDay->format('Y'),'month'=>$firstDay->format('m')])); ?>">
          <div class="btn btn-danger py-0" style="cursor:pointer;"><i class="fa fa-download" aria-hidden="true"></i> 勤務表の一括出力</div>
        </a>
      </div>
      <?php endif; ?>
    </div>

    <?php if($status): ?>
      <div class="mt-5 alert alert-danger text-center" role="alert">
        <?php echo nl2br(e($status)); ?>

      </div>
    <?php else: ?>

      <table class="table table-bordered table-sm table-hover" style="table-layout:fixed;">
        <thead class="thead-light">
          <tr>
            <th class="text-center" style="width:70px;">編集</th>
            <th class="text-center" style="width:100px;">勤務日</th>
            <th class="text-center" style="width:60px;">シフト</th>
            <th class="text-center" style="width:80px;">出勤</th>
            <th class="text-center" style="width:80px;">退勤</th>
            <th class="text-center" style="width:120px;">休憩1</th>
            <th class="text-center" style="width:120px;">休憩2</th>
            <th class="text-center" style="width:120px;">休憩3</th>
            <th class="text-center" style="width:60px;">遅刻<br>早退</th>
            <th class="text-center" style="width:160px;">特別事由</th>
            <th class="text-center" style="width:160px;">備考</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($date->month == $firstDay->month): ?>
            <tr
            <?php if($holidays[$date->timestamp] || $date->dayOfWeek == 0): ?>
              class="table-danger"
            <?php elseif($date->dayOfWeek == 6): ?>
              class="table-info"
            <?php endif; ?>
            >

              <?php
                $item = $items[$date->timestamp]; $item->workTable ? $item=$item->workTable : $item;
                $wl = App\Models\WorkLoad::where('shiftTableId',$item->shiftTableId);
                $cnt = $wl->count();
                $wl = $wl->where('teamProjectId',$nonOpe)->first();
                $sh = create_time(init_value($item->startHour),init_value($item->startMinute));
                $eh = create_time(init_value($item->endHour),init_value($item->endMinute));
              ?>

              <td class="text-center">
                <a href="<?php echo e(route('work_table.doEdit',['d'=>$date->timestamp,'uid'=>$userId,'sid'=>$item->shiftTableId])); ?>" class="btn btn-sm py-0  <?php if($wl): ?><?php echo e('btn-danger'); ?><?php elseif(!$wl): ?> <?php if($sh == '-' && $eh == '-'): ?><?php echo e('btn-primary'); ?><?php elseif($cnt>0): ?><?php echo e('btn-primary'); ?><?php else: ?><?php echo e('btn-danger'); ?><?php endif; ?>  <?php endif; ?>" style="font-size:12px;"><i class="fa fa-edit" aria-hidden="true"></i> 編集</a>
              </td>

              <td class="text-center">
              <?php echo e($date->format('m/d').'('.$calendar->weekday()[$date->dayOfWeek].')'); ?>

              </td>

              <td class="text-center"><?php echo e($item->shiftName ? $item->shiftName : $item->shift->shift->shiftName); ?></td>

              <td class="text-center">
                <?php echo e($sh); ?>

              </td>

              <td class="text-center">
                <?php echo e($eh); ?>

              </td>

              <td class="text-center">
                <?php $val = init_value($item->rest1StartHour); ?>
                <?php if($val === '-'): ?>
                  -
                <?php else: ?>
                  <?php echo e(create_time($val,init_value($item->rest1StartMinute))); ?>

                  ～
                  <?php echo e(create_time(init_value($item->rest1EndHour),init_value($item->rest1EndMinute))); ?>

                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php $val = init_value($item->rest2StartHour); ?>
                <?php if($val === '-'): ?>
                  -
                <?php else: ?>
                  <?php echo e(create_time($val,init_value($item->rest2StartMinute))); ?>

                  ～
                  <?php echo e(create_time(init_value($item->rest2EndHour),init_value($item->rest2EndMinute))); ?>

                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php $val = init_value($item->rest3StartHour); ?>
                <?php if($val === '-'): ?>
                  -
                <?php else: ?>
                  <?php echo e(create_time($val,init_value($item->rest3StartMinute))); ?>

                  ～
                  <?php echo e(create_time(init_value($item->rest3EndHour),init_value($item->workTable->rest3EndMinute,$item->rest3EndMinute))); ?>

                <?php endif; ?>
              </td>

              <td class="text-center">
                <?php if($item->lateEarlyLeave==1): ?>
                  あり
                <?php endif; ?>
              </td>

              <td>
                <?php if(isset($item->specialReason)): ?>
                  <?php echo e($item->specialReason); ?>

                <?php endif; ?>
              </td>

              <td>
                <?php if(isset($item->remarks)): ?>
                  <?php echo e($item->remarks); ?>

                <?php endif; ?>
              </td>

            </tr>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

    <?php endif; ?>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/work_table/work_table_index.blade.php ENDPATH**/ ?>