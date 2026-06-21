

<?php $__env->startSection('title', '投稿一覧'); ?>

<?php $__env->startSection('content'); ?>
    <h1>投稿一覧</h1>

    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="post">
            <h2><a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e($post->title); ?></a></h2>
            <p class="category">カテゴリー: <?php echo e($post->category); ?></p>
            <p><?php echo e(Str::limit($post->content, 80)); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>投稿がまだありません。</p>
    <?php endif; ?>

    <div>
        <?php echo e($posts->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/posts/index.blade.php ENDPATH**/ ?>