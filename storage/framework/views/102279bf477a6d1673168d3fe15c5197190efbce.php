<?php $__env->startSection('content'); ?>

<?php
    function userCheck($id)
    {
        $user = app\User::find($id);
        $user = isset($user) ? $user->name : '不明' ;
        return $user;
    }
?>

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col">
            <h3><?php echo $__env->make('components.returnLinkButton',['item'=>'/system_top/'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>　要望板</h3>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col">
            出来るだけ詳細に記載していただくと助かります。<br>
            リクエストいただいたもので既に完了したものの一覧は<a href="<?php echo e(route('system_top.doCompShow')); ?>" class="h5">こちら</a>からご確認いただけます。
          </div>
        </div>
        <div class="row ml-5">
          <div class="col">
            <div class="row mt-3 ml-1">
              <div class="col">
                <?php $__currentLoopData = $requestClassifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="row mt-1">
                    <div class="col">
                      <img class="" alt="<?php echo e($item->requestClassification); ?>" src="<?php echo e(asset( 'images/'.$item->requestImage )); ?>" width="70px">
                      ・・・<?php echo e($item->explanation); ?>

                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row mt-3 ml-1 justify-content-start">
          <div class="col-md-8">
            <div class="border p-1 <?php echo e($item->requestClassification->requestColorClass); ?>">
              <div class="row ml-1 d-flex justify-content-between">
                <div class="col-6 align-self-center">
                  <img class="" alt="<?php echo e($item->requestClassification->requestClassification); ?>" src="<?php echo e(asset( 'images/'.$item->requestClassification->requestImage )); ?>" width="70px">
                  <span class="ml-2"><?php echo e($item->created_at->format('Y-m-d')); ?></span>
                </div>
                <div class="col-2">
                  <?php echo e(Form::open(['route'=>['system_top.requestDestroy',$item->fstSystemRequestPlateId],'method'=>'DELETE','id'=>'form_'.$item->fstSystemRequestPlateId])); ?>

                  <?php echo e(Form::submit('削除',['class' => 'btn btn-danger btn-sm p-1 deleteConf','data-id'=>$item->fstSystemRequestPlateId])); ?>

                  <?php echo e(Form::close()); ?>

                </div>
              </div>
              <div class="row mt-1 ml-1 d-flex">
                <div class="col-10">
                  <?php echo nl2br(e($item->requestMessage)); ?>

                </div>
                <?php $length = count($item->replyToRequests); ?>
                <div class="col-2 align-self-end">
                <?php if($length==0): ?>
                  <a href="<?php echo e(route('system_top.edit',$item->fstSystemRequestPlateId)); ?>" class="btn btn-success btn-sm p-1">返信</a>
                <?php else: ?>
                  <small><a id="reply_<?php echo e($item->fstSystemRequestPlateId); ?>" class="openReply text-primary" style="cursor:pointer;">返信を開く...</a></small>
                <?php endif; ?>
                </div>
              </div>
              <?php if(empty(!($item->created_by))): ?>
                <div class="row ml-1">
                  <div class="col-10">
                    <div class="small">
                      作成者：<?php echo e(userCheck($item->created_by)); ?>

                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col align-self-center">
            <a href="<?php echo e(route('system_top.editDoComp',$item->fstSystemRequestPlateId)); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('本当に完了にして良いですか？')">完了</a>
          </div>
        </div>
          <?php $cnt=1; ?>
          <?php $__currentLoopData = $item->replyToRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row mt-2 ml-5 addReply reply_<?php echo e($item->fstSystemRequestPlateId); ?>" style="display:none;">
            <div class="col-md-10">
              <div class="border p-1 border-success">
                <div class="row ml-1 d-flex justify-content-between">
                  <div class="col-6 align-self-center">
                    <img class="" alt="返信" src="<?php echo e(asset( 'images/reply.png' )); ?>" width="70px">
                    <span class="ml-2"><?php echo e($reply->created_at->format('Y-m-d')); ?></span>
                  </div>
                </div>
                <div class="row mt-1 ml-1 d-flex">
                  <div class="col-10">
                    <?php echo nl2br(e($reply->reply)); ?>

                  </div>
                  <?php if($length===$cnt): ?>
                  <div class="col-2 align-self-end">
                    <a href="<?php echo e(route('system_top.edit',$item->fstSystemRequestPlateId)); ?>" class="btn btn-success btn-sm p-1">返信</a>
                  </div>
                  <?php endif; ?>
                </div>
                <?php if(empty(!($reply->created_by))): ?>
                  <div class="row ml-1">
                    <div class="col-10">
                      <div class="small">
                        作成者：<?php echo e(userCheck($reply->created_by)); ?>

                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php $cnt++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row mt-5 justify-content-center">
          <div class="col-md-10">
            <?php echo e(Form::open(['route'=>'system_top.store'])); ?>

            <div class="form-group">
              <?php echo e(Form::select('requestClassificationId',$masterRequestClassifications,old('requestClassificationId'),['placeholder'=>'---分類を選択---','class'=>'col-md-4'])); ?>

              <?php $__errorArgs = ['requestClassificationId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <br><span class="ml-2 text-danger"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
              <?php echo e(Form::textarea('requestMessage','',['class'=>'form-control','rows'=>'3','placeholder'=>'出来るだけ詳細に記入してください'])); ?>

              <?php $__errorArgs = ['request'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="ml-2 text-danger"><?php echo e($message); ?></span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group text-center">
              <?php echo e(Form::submit('新規登録',['class'=>'w-25 btn btn-primary'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/system_top/system_top_create.blade.php ENDPATH**/ ?>