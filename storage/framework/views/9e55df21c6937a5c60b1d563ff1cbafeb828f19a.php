<?php $__env->startSection('content'); ?>
<div class="contents">
  <div class="container container-top">
    <div class="row">
      <div class="col">
        <h1><?php echo $__env->make('components.returnLinkButton',['item'=>'/system_top'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md">
                <h5>ユーザー一覧</h5>
              </div>
              <div class="col-md text-right">
                <a href="<?php echo e(asset('/user_regist/create')); ?>"><button type="button" class="w-50 btn btn-primary">ユーザー | 新規登録</button></a>
              </div>
            </div>
          </div>


          <table class="table table-hover">
            <thead>
              <tr>
                <th>勤務表</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>権限名</th>
                <th>最終ログイン</th>
                <th>修正</th>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-higher')): ?>
                  <th>リセット</th>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system-only')): ?>
                  <th>削除</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody id="sort-able">
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->role != '1'): ?>

                <tr id="<?php echo e($item->id); ?>">
                  <td>
                      <a href="<?php echo e(route('work_table.index',['uid'=>$item->id])); ?>"><div class="btn btn-sm btn-primary py-0">勤務表</div></a><br>
                      <a href="<?php echo e(route('work_load.index',['uid'=>$item->id])); ?>"><div class="btn btn-sm btn-secondary py-0 mt-1">工数表</div></a>
                  </td>
                  <td><?php echo e($item->name); ?></td>
                  <td><?php echo e($item->email); ?></td>
                  <td><?php echo e($item->master_role->roleName); ?></td>
                  <td>
                    <?php if(empty(!($item->last_login_at))): ?>
                      <?php echo e($item->last_login_at->format('Y年m月d日 H時i分')); ?>

                    <?php endif; ?>
                  </td>
                  <td><a href="<?php echo e(route('user.edit',$item->id)); ?>" class="btn btn-success btn-sm py-0"><i class="fas fa-edit"></i> 修正</a></td>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-higher')): ?>
                    <td>
                      <?php echo e(Form::open(array('route' => array('user.password_reset', $item->id), 'method' => 'POST'))); ?>

                      <?php echo e(Form::submit('リセット',['class'=>'btn btn-sm btn-warning py-0','onclick'=>"return confirm('パスワードをリセットしてもよろしいですか？')"])); ?>

                      <?php echo e(Form::close()); ?>

                    </td>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system-only')): ?>
                    <td>
                      <form action="<?php echo e(route('user.destroy', $item->id)); ?>" id="form_<?php echo e($item->id); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('delete')); ?>

                        <a href="#" data-id="<?php echo e($item->id); ?>" class="btn btn-danger deleteConf btn-sm py-0"><i class="fas fa-trash-alt"></i> 削除</a>
                      </form>
                    </td>
                  <?php endif; ?>
                </tr>

                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>

          <div class="card-footer d-flex justify-content-center align-middle">

          </div>
        </div>
      </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system-only')): ?>
    <div class="row mt-5">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md">
                <h5>削除済みユーザー一覧</h5>
              </div>
            </div>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>権限名</th>
                <th>最終ログイン</th>
                <th>修正</th>
                <th>削除</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $trashItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($item->name); ?></td>
                <td><?php echo e($item->email); ?></td>
                <td><?php echo e($item->master_role->roleName); ?></td>
                <td>
                  <?php if(empty(!($item->last_login_at))): ?>
                    <?php echo e($item->last_login_at->format('Y年m月d日 H時i分')); ?>

                  <?php endif; ?>
                </td>
                <td><a href="<?php echo e(route('user.restore',$item->id)); ?>" class="btn btn-success btn-sm">戻す</a></td>
                <td>
                  <form action="<?php echo e(route('user.forceDelete', $item->id)); ?>" id="form_<?php echo e($item->id); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('delete')); ?>

                    <a href="#" data-id="<?php echo e($item->id); ?>" class="btn btn-danger deleteConf btn-sm">完全削除</a>
                  </form>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <div class="card-footer d-flex justify-content-center align-middle">

          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/user_regist/user_registration_index.blade.php ENDPATH**/ ?>