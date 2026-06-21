<?php $__env->startSection('title', '商品一覧'); ?>

<?php $__env->startSection('content'); ?>
    <h1>商品一覧</h1>

    <p><a href="<?php echo e(route('products.create')); ?>">+ 新規登録</a></p>

    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="post">
            <h2><a href="<?php echo e(route('products.show', $product)); ?>"><?php echo e($product->name); ?></a></h2>
            <p class="category">カテゴリー: <?php echo e($product->category); ?> ／ 価格: ¥<?php echo e(number_format($product->price)); ?> ／ 在庫: <?php echo e($product->stock); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>商品がまだありません。</p>
    <?php endif; ?>

    <div>
        <?php echo e($products->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/products/index.blade.php ENDPATH**/ ?>