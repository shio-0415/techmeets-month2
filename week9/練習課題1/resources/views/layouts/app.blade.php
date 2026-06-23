<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'タスク管理アプリ')</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
        .card { border: 1px solid #ddd; border-radius: 6px; padding: 15px; margin-bottom: 15px; }
        .alert { background: #d4edda; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .error { color: red; font-size: 0.9em; }
        .tag { display: inline-block; background: #eee; padding: 2px 8px; border-radius: 10px; font-size: 0.85em; margin-right: 4px; }
        form input, form textarea, form select { display: block; width: 100%; margin-bottom: 10px; padding: 6px; }
        button { padding: 6px 16px; }
        nav { margin-bottom: 20px; }
    </style>
</head>
<body>
    <nav><a href="{{ route('projects.index') }}">プロジェクト一覧</a></nav>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html>
