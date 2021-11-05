<?php $__env->startSection('content'); ?>

<?php
  $prevMonth = $firstDay->copy()->subMonth();
  $nextMonth = $firstDay->copy()->addMonth();
  $str='';
?>

<div class="contents">
  <div class="container container-top">
    <div class="row">
      <div class="col text-left">
        <a href="<?php echo e(route('shift_table.index',['year'=>$prevMonth->format('Y'),'month'=>$prevMonth->format('m')])); ?>">
          <i class="fa fa-lg fa-chevron-circle-left" style="color:#65ab31;"><small><?php echo e($prevMonth->format('Y年m月')); ?></small></i>
        </a>
      </div>
      <div class="col text-center">
        <a href="<?php echo e(route('shift_table.index')); ?>">
          <i class="fa fa-lg fa-angle-left" style="color:#65ab31;"><small>当月へ</small></i><i class="fa fa-lg fa-angle-right" style="color:#65ab31;"></i>
        </a>
      </div>
      <div class="col text-right">
        <a href="<?php echo e(route('shift_table.index',['year'=>$nextMonth->format('Y'),'month'=>$nextMonth->format('m')])); ?>">
          <i class="fa fa-lg fa-chevron-circle-right" style="color:#65ab31;"><small><?php echo e($nextMonth->format('Y年m月')); ?></small></i>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 mt-3 ml-5 align-self-center">
        <div class="h3"><?php echo e($firstDay->format('Y年m月')); ?>シフト表</div>
      </div>
    </div>

    <table class="table table-bordered table-sm shift-table table-hover">
      <!-- 名前列 -->
      <col span="1" style="background-color: #fffacd;">

      <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($date->month == $firstDay->month): ?>
          <?php if($holidays[$date->timestamp] || $date->dayOfWeek == 0): ?>
            <!-- 祝日または日曜日 -->
            <col span="1" style="background-color: #ffc0cb;">
          <?php elseif($date->dayOfWeek == 6): ?>
            <!-- 土曜日 -->
            <col span="1" style="background-color: #e0ffff;">
          <?php else: ?>
            <col span="1">
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <thead>
        <tr>
          <th style="display: none;">id</th>
          <th class="shift-table-title text-center">名前</th>
          <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($date->month == $firstDay->month): ?>
            <th class="text-center">
              <?php echo e($date->day); ?><br>
              <?php echo e($calendar->weekday()[$date->dayOfWeek]); ?>

            </th>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
      </thead>
      <tbody>
          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($shift === reset($item)): ?>
                <?php $str = ($shift === Auth::id()) ? 'font-weight-bold':''; ?>
                <td style="display: none;">
                  <?php echo e($shift); ?>

                </td>
              <?php elseif($shift): ?>
                <td class="small text-center text-nowrap <?php echo e($str); ?>">
                  <?php echo e($shift); ?>

                </td>
              <?php else: ?>
                <td class=""></td>
              <?php endif; ?>
              <?php if($loop->iteration > $firstDay->format('t') + 1): ?>
                <?php break; ?>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-higher')): ?>
    <div class="mt-3">
      <?php echo e(Form::open(['route'=>'shift_table.store','enctype'=>'multipart/form-data','method'=>'POST'])); ?>


      <div class="form-group mt-5 form-inline">
        <?php echo e(Form::label('file','添付ファイル',['class'=>'col-md-2'])); ?>

        <div class="input-group col-md-4">
            <div class="custom-file">
                <?php echo e(Form::file('file',['class'=>'custom-file-input','id'=>'file','name'=>'file'])); ?>

                <?php echo e(Form::label('file','ファイル選択...',['class'=>'custom-file-label','for'=>'file','data-browse'=>'参照'])); ?>

            </div>
            <div class="input-group-append">
                <?php echo e(Form::button('取消',['class'=>'btn btn-outline-secondary reset'])); ?>

            </div>
        </div>
        <div class="form-group text-center">
          <?php echo e(Form::button('<i class="fa fa-file-upload" aria-hidden="true"></i> シフト登録',['class'=>'btn btn-primary','type'=>'submit'])); ?>

        </div>
      </div>
      <?php echo e(Form::close()); ?>


      <div class="col-md-8 mt-5 text-center">
        <div class="btn btn-warning"><a href=<?php echo e(route("shift_table.export")); ?>><i class="fa fa-download" aria-hidden="true"></i> ユーザー一覧ダウンロード</a></div>
      </div>
      <div class="col-md-8 mt-3 text-center">
        <div class="btn btn-warning"><a href=<?php echo e(route("master_shifts.export")); ?>><i class="fa fa-download" aria-hidden="true"></i> マスターシフトダウンロード</a></div>
      </div>
    </div>
    <?php endif; ?>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/shift_table/shift_table_index.blade.php ENDPATH**/ ?>