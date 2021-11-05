<?php $__env->startSection('header'); ?>

<?php
  $dispDate = new Carbon\Carbon(now());
  $user = Auth::user();
?>
<!--
  navbar-fixed-topが機能しない？？
-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#87ceeb;">
  <div class="container">
    <a class="navbar-brand" href="<?php echo e(asset('/system_top')); ?>">フェイス・ソリューション・テクノロジーズ株式会社</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav mr-auto">

      </ul>

      <ul class="navbar-nav">

          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <?php echo e($user->name.'（'.$user->master_role->roleName.'）'); ?>さん<span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo e(route('work_table.index')); ?>">勤務表</a>
                  <a class="dropdown-item" href="<?php echo e(route('work_load.index')); ?>">工数表</a>
                  <a class="dropdown-item" href="<?php echo e(route('shift_table.index')); ?>">シフト表</a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ope-only')): ?>
                  <a class="dropdown-item" href="<?php echo e(asset('/take_over?dispDate=')); ?><?php echo e($dispDate->timestamp); ?>">監視引継ぎページ</a>
                  <a class="dropdown-item" href="<?php echo e(asset('/live_monitaring_plan')); ?>">ライブ予定確認ページ</a>
                <?php endif; ?>
                <a class="dropdown-item" href="<?php echo e(asset('/master_clients')); ?>">顧客一覧ページ</a>
                <a class="dropdown-item" href="<?php echo e(asset('/master_projects')); ?>">案件一覧ページ</a>
                <!-- <a class="dropdown-item" href="">継続案件一覧ページ</a>
                <a class="dropdown-item" href="">入札案件一覧ページ</a>
                <a class="dropdown-item" href="">短期案件一覧ページ</a> -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-higher')): ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo e(route('user.index')); ?>">ユーザー一覧</a>
                  <a class="dropdown-item" href="<?php echo e(route('master_shifts.index')); ?>">シフト一覧</a>
                  <a class="dropdown-item" href="<?php echo e(route('paid_leave.index')); ?>">有給取得確認</a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system-only')): ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo e(asset('/dummy')); ?>/<?php echo e(date("Y")); ?>/<?php echo e(date("m")); ?>">テスト用ダミーページ</a>
                  <!-- <a class="dropdown-item" href="<?php echo e(route('calendar.show')); ?>">テストカレンダー</a> -->
                  <a class="dropdown-item" href="<?php echo e(asset('/dev_deleted_items')); ?>">開発者用削除アイテム確認</a>
                  <a class="dropdown-item" href="<?php echo e(asset('/dev_confirm')); ?>">開発者用進捗確認ページ</a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('change_password.index')); ?>">
                  <?php echo e(__('Change Password')); ?>

                </a>
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('study_session.index')); ?>">勉強会用ページ</a>
              </div>
          </li>

      </ul>

    </div>
  </div>
</nav>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/common/header.blade.php ENDPATH**/ ?>