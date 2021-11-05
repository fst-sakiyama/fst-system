<?php $__env->startSection('content'); ?>

<div class="contents">
  <div class="container container-top">
    <h1><?php echo $__env->make('components.returnLinkButton',['item'=>'/paid_leave'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col h5">
                    有給取得確認
                </div>
            </div>
        </div>

        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th>集計</th>
                    <th>名前</th>
                    <th>有給付与日</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->role != '1'): ?>
                    <tr>

                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('paid-leave-set', ['item' => $item])->html();
} elseif ($_instance->childHasBeenRendered('1armNEP')) {
    $componentId = $_instance->getRenderedChildComponentId('1armNEP');
    $componentTag = $_instance->getRenderedChildComponentTagName('1armNEP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1armNEP');
} else {
    $response = \Livewire\Livewire::mount('paid-leave-set', ['item' => $item]);
    $html = $response->html();
    $_instance->logRenderedChild('1armNEP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\fst-system\resources\views/components/paid_leave/paid_leave_create.blade.php ENDPATH**/ ?>