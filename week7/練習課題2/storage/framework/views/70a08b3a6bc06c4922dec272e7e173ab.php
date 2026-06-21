<?php $__env->startSection('title', 'イベント一覧'); ?>

<?php $__env->startSection('content'); ?>
    <h1>イベント一覧</h1>

    <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="post">
            <h2><a href="<?php echo e(route('events.show', $event)); ?>"><?php echo e($event->title); ?></a></h2>
            <p class="category">開催日時: <?php echo e(\Carbon\Carbon::parse($event->date)->format('Y/m/d H:i')); ?></p>
            <p><?php echo e(Str::limit($event->description, 80)); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>イベントがまだありません。</p>
    <?php endif; ?>

    <div>
        <?php echo e($events->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/events/index.blade.php ENDPATH**/ ?>