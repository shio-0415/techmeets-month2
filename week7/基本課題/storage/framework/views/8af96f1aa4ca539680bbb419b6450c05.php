<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'ブログシステム'); ?></title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
        nav { margin-bottom: 20px; }
        .post { border-bottom: 1px solid #ddd; padding: 15px 0; }
        .category { color: #888; font-size: 0.9em; }
        .alert { background: #d4edda; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .error { color: red; font-size: 0.9em; }
        form input, form textarea, form select { display: block; width: 100%; margin-bottom: 10px; padding: 6px; }
        button { padding: 6px 16px; }
    </style>
</head>
<body>
    <nav>
        <a href="<?php echo e(route('posts.index')); ?>">投稿一覧</a> |
        <a href="<?php echo e(route('posts.create')); ?>">新規投稿</a>
    </nav>

    <?php if(session('success')): ?>
        <div class="alert"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>