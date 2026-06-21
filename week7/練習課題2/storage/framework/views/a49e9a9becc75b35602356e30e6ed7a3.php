<?php $__env->startSection('title', '予約一覧'); ?>

<?php $__env->startSection('content'); ?>
    <h1>予約一覧</h1>

    <?php $__empty_1 = true; $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="post">
            <h2><?php echo e($reservation->event->title); ?></h2>
            <p class="category">
                <?php echo e($reservation->name); ?> 様 ／ <?php echo e($reservation->email); ?> ／ <?php echo e($reservation->number_of_people); ?>名
                ／ 予約日時: <?php echo e(\Carbon\Carbon::parse($reservation->reserved_at)->format('Y/m/d H:i')); ?>

            </p>
            <form action="<?php echo e(route('reservations.destroy', $reservation)); ?>" method="POST" onsubmit="return confirm('本当にキャンセルしますか？');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit">キャンセル</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>予約がまだありません。</p>
    <?php endif; ?>

    <div>
        <?php echo e($reservations->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/reservations/index.blade.php ENDPATH**/ ?>