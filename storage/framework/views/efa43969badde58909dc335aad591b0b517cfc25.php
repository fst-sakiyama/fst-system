<?php $__env->startSection('content'); ?>

<?php
  $i=1;
  $length = count($contractTypes);
?>

<div class="contents">
  <div class="container container-top">
    <h1><?php echo $__env->make('components.returnButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">案件一覧</h5>

        <?php $__currentLoopData = $contractTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($i === 1): ?>
            <div class="row">
              <div class="col">
                <ul class="nav nav-tabs nav-fill nav-pills" id="myTab" role="tablist">
          <?php endif; ?>
                  <li class="nav-item">
                    <a class="nav-link <?php if($i === 1): ?> active <?php endif; ?>" id="item<?php echo e($contractType->contractTypeId); ?>-tab" data-toggle="tab" href="#item<?php echo e($contractType->contractTypeId); ?>" role="tab" aria-controls="item<?php echo e($contractType->contractTypeId); ?>">
                      <img class="" alt="<?php echo e($contractType->contractType); ?>" src="<?php echo e(asset( 'images/'.$contractType->contractTypeImage )); ?>" width="70px">
                    </a>
                  </li>
          <?php if($i === $length): ?>
                </ul>
              </div>
            </div>
          <?php endif; ?>
          <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $i=1; $prevId=null; ?>

        <?php $__currentLoopData = $contractTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($i === 1): ?>
            <div class="tab-content" id="myTab-content">
          <?php endif; ?>
              <div class="tab-pane fade <?php if($i === 1): ?> show active <?php endif; ?>" id="item<?php echo e($contractType->contractTypeId); ?>" role="tabpanel" aria-labelledby="item<?php echo e($contractType->contractTypeId); ?>-tab">
                <div class="row">
                  <div class="col">

                    <div class="card">

                        <table class="table table-sm table-hover">
                          <thead>
                            <tr>
                              <th style="width: 50%;">案件名</th>
                              <th style="width: 8%;">開始日</th>
                              <th style="width: 8%;">完了日</th>
                              <th style="width: 10%;">稼働</th>
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales-only')): ?>
                              <th style="width:12%;">修正</th>
                              <th style="width:12%;">削除</th>
                              <?php endif; ?>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $__currentLoopData = $items[$contractType->contractTypeId]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $nowId = $item->clientId; ?>
                            <?php if(is_null($prevId) || $item->clientId !== $prevId): ?>
                              <tr data-href="<?php echo e(asset('/clients_detail?id=')); ?><?php echo e($item->clientId); ?>" style="cursor:pointer;">
                                <td colspan="6" class="table-dark h5">
                                  <div class="row">
                                  <div class="col-10"><?php echo e($item->client->clientName); ?></div>
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales-only')): ?>
                                  <div class="col-2 text-right"><a href="<?php echo e(asset('/clients_detail/create?id=')); ?><?php echo e($item->clientId); ?>"><button type="button" class="btn btn-primary btn-sm p-0">新規登録</button></a></div>
                                  <?php endif; ?>
                                  </div>
                                </td>
                              </tr>
                            <?php endif; ?>
                              <tr data-href="<?php echo e(asset('/file_posts?id=')); ?><?php echo e($item->projectId); ?>" style="cursor:pointer;">
                                <td><?php echo e($item->projectName); ?></td>
                                <td><?php echo e($item->startDate); ?></td>
                                <td><?php echo e($item->endDate); ?></td>
                                <td>
                                    <?php $__currentLoopData = $item->teamProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workingTeam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <img class="" alt="<?php echo e($workingTeam->workingTeam->workingTeam); ?>" src="<?php echo e(asset( 'images/'.$workingTeam->workingTeam->workingTeamImage )); ?>" width="40px">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales-only')): ?>
                                <td><a href="<?php echo e(route('clients_detail.edit',$item->projectId)); ?>" class="btn btn-success btn-sm py-0"><i class="fas fa-edit"></i> 修正</a></td>
                                <td>
                                  <?php echo e(Form::open(['route'=>['clients_detail.destroy',$item->projectId],'method'=>'DELETE','id'=>'form_'.$item->projectId])); ?>

                                  <?php echo Form::button('<i class="fas fa-trash-alt"></i> 削除',['class' => 'btn btn-danger btn-sm deleteConf py-0','data-id'=>$item->projectId,'type'=>'submit']); ?>

                                  <?php echo e(Form::close()); ?>

                                </td>
                                <?php endif; ?>
                              </tr>
                            <?php $prevId = $nowId; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>

                    </div>

                  </div>
                </div>
              </div>

          <?php if($i === $length): ?>
            </div>
          <?php endif; ?>
          <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        <div class="card-footer d-flex justify-content-center align-middle">
          案件一覧
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/master_projects/master_projects_index.blade.php ENDPATH**/ ?>