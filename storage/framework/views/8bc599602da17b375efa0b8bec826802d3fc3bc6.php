<?php $__env->startSection('content'); ?>

<div class="contents">
  <div class="container">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col">
            <h3><?php echo $__env->make('components.returnButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>　要望板｜完了済</h3>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col">
            要望板にてリクエストのあった内容のうち作業が完了したものです。
          </div>
        </div>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row mt-3 ml-1 justify-content-start">
          <div class="col-md-8">
            <div class="border p-1 <?php echo e($item->requestClassification->requestColorClass); ?>">
              <div class="row ml-1 d-flex justify-content-between">
                <div class="col-6 align-self-center">
                  <img class="" alt="<?php echo e($item->requestClassification->requestClassification); ?>" src="<?php echo e(asset( 'images/'.$item->requestClassification->requestImage )); ?>" width="70px">
                  <span class="ml-2"><?php echo e($item->doComp->format('Y-m-d')); ?></span>
                </div>
              </div>
              <div class="row mt-1 ml-1 d-flex">
                <div class="col-10">
                  <?php echo nl2br(e($item->requestMessage)); ?>

                </div>
                <?php $length = count($item->replyToRequests); ?>
                <div class="col-2 align-self-end">
                <?php if($length > 0): ?>
                  <small><a id="reply_<?php echo e($item->fstSystemRequestPlateId); ?>" class="openReply text-primary" style="cursor:pointer;">返信を開く...</a></small>
                <?php endif; ?>
                </div>
              </div>
            </div>
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
                </div>
              </div>
            </div>
          </div>
          <?php $cnt++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row mt-5">
          <div class="col d-flex justify-content-center align-middle">
            <?php echo e($items->onEachSide(2)->links('pagination::bootstrap-4')); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/system_top/system_top_docomp_show.blade.php ENDPATH**/ ?>