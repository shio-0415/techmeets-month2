<?php $__env->startSection('title', $event->title); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($event->title); ?></h1>
    <p class="category">開催日時: <?php echo e(\Carbon\Carbon::parse($event->date)->format('Y/m/d H:i')); ?></p>
    <?php if($event->capacity): ?>
        <p class="category">定員: <?php echo e($event->capacity); ?>人</p>
    <?php endif; ?>
    <p><?php echo e($event->description); ?></p>

    <p><a href="<?php echo e(route('reservations.create', $event)); ?>">このイベントを予約する</a></p>

    <h3>予約状況</h3>
    <?php $__empty_1 = true; $__currentLoopData = $event->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="post">
            <p><?php echo e($reservation->name); ?> 様 - <?php echo e($reservation->number_of_people); ?>名</p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>まだ予約はありません。</p>
    <?php endif; ?>

    <p><a href="<?php echo e(route('events.index')); ?>">← イベント一覧へ戻る</a></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/events/show.blade.php ENDPATH**/ ?>