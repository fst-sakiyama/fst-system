<?php $__env->startSection('content'); ?>

<?php
  $todayDate = Carbon\Carbon::now();
  $classification = array('','【共通】','【共通：管理者】','【経理】','【経理：管理者】','【営業】','【営業：管理者】','【開発】','【開発：管理者】','【運用】','【運用：管理者】');
  $gate = array('','user-higher','admin-higher','account-only','admin-higher','sales-only','admin-higher','dev-only','admin-higher','ope-only','admin-higher');
?>

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>利用方法について</h3>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system-only')): ?>
        <div  class="row mt-3 ml-1">
          <div class="col">
            <a href="<?php echo e(route('top_information.create')); ?>">
              <div class="btn btn-sm btn-warning">新規登録</div>
            </a>
          </div>
        </div>
        <?php endif; ?>

        <div class="mt-3">
        <?php $__currentLoopData = $fstSystemInformation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mt-1 ml-1">
              <div class="col">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($gate[$item->classification])): ?>
                <li>
                  <?php echo e($classification[$item->classification]); ?>

                  <?php if(empty($item->fileName)): ?>
                    <?php echo e($item->information); ?>

                  <?php else: ?>
                    <a href="<?php echo e(route('file_infoShow.infoShow',['id'=>$item->id])); ?>" target="topinfo" class="h6"><?php echo e($item->information); ?>（<?php echo e($item->fileName); ?>）</a>
                  <?php endif; ?>
                </li>
                <?php endif; ?>
              </div>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system-only')): ?>
              <div class="col-3 clearfix">
                <div class="float-right">
                  <a href="<?php echo e(route('top_information.edit',[$item->id])); ?>" class="btn btn-sm btn-primary py-0">修正</a>
                  <?php echo e(Form::open(['route'=>['top_information.destroy',$item->id],'method'=>'DELETE'])); ?>

                  <?php echo e(Form::submit('削除',['class' => 'btn btn-danger btn-sm py-0','onclick'=>"return confirm('本当に削除して良いですか？')"])); ?>

                  <?php echo e(Form::close()); ?>

                </div>
              </div>
              <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>最近の更新情報</h3>
        <div class="row mt-3">
          <div class="col">
          <?php $__currentLoopData = $progressDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row mt-2 ml-1">
            <div class="col-md-2">
              <?php
                $doComp = $item->doComp;
              ?>
              <?php echo e($doComp->format('Y-m-d')); ?>

            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <?php echo e($item->progress->fstSystemPlan); ?>

                  <?php if($doComp->diffInWeeks($todayDate)<=2): ?>
                    <img class="" alt='新規' src="<?php echo e(asset( 'images/new.png' )); ?>" width="50px">
                  <?php endif; ?>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <?php echo e($item->fstSystemPlanDetail); ?><br>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col d-flex justify-content-center align-middle">
          <?php echo e($progressDetails->onEachSide(2)->links('pagination::bootstrap-4')); ?>

        </div>
      </div>
    </div>
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <h3>要望板</h3>
        <div class="row mt-3 ml-1">
          <div class="col">
            バグ報告や機能修正のリクエスト、機能追加のリクエストは、<a href="<?php echo e(asset('/system_top/create')); ?>" class="h5">こちら</a>からご報告ください。<br>
            リクエストいただいたもので既に完了したものの一覧は<a href="<?php echo e(route('system_top.doCompShow')); ?>" class="h5">こちら</a>からご確認いただけます。
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/system_top/system_top_index.blade.php ENDPATH**/ ?>