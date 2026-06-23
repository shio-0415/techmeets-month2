# 練習課題2: リファクタリング演習（Fat Controller → Repository/Service）

`week9/基本課題` の `PostController` を例に、Fat Controller（肥大化したコントローラー）を
Repository/Serviceパターンでリファクタリングした過程をまとめます。

## Before: Fat Controller（Week8時点）

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // ① バリデーション（本来はFormRequestに分離すべき）
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // ② 認可チェック（本来はPolicyに分離すべき）
        if (! auth()->check()) {
            abort(403);
        }

        // ③ ビジネスロジック・DB操作が直接書かれている
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);

        // ④ コントローラーがDBの詳細（Eloquent）を直接知っている
        return redirect()->route('posts.index')->with('success', '投稿しました');
    }

    public function update(Request $request, Post $post)
    {
        // 認可チェックがコントローラーに直接書かれている
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', '投稿を更新しました');
    }
}
```

### Before の問題点

| 問題 | 内容 |
|---|---|
| 単一責任の原則に違反 | バリデーション・認可・DB操作・レスポンス生成を1つのメソッドが全部担当している |
| テストしにくい | コントローラーを呼ぶには必ずHTTPリクエストが必要。ビジネスロジックだけを単体でテストできない |
| 再利用しにくい | 同じ「投稿作成」ロジックをコマンドラインやAPIから呼びたくても、コントローラーに埋め込まれているため使い回せない |
| 認可ロジックが分散 | `abort(403)` がメソッドごとに直接書かれており、ルールを変更する際に複数箇所を探して直す必要がある |

## After: Repository/Serviceパターン

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(
        protected PostService $postService
    ) {}

    public function store(StorePostRequest $request)
    {
        $this->postService->createPost($request->validated(), auth()->id());
        return redirect()->route('posts.index')->with('success', '投稿しました');
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $this->postService->updatePost($post, $request->validated());
        return redirect()->route('posts.index')->with('success', '投稿を更新しました');
    }
}
```

### After で変わったこと

| 観点 | Before | After |
|---|---|---|
| バリデーション | コントローラー内で `$request->validate()` | `StorePostRequest` / `UpdatePostRequest` に分離 |
| 認可 | `if (...) { abort(403); }` を手書き | `PostPolicy` + `$this->authorize()` |
| DB操作 | `Post::create()` を直接呼ぶ | `PostService` → `PostRepository` 経由 |
| コントローラーの役割 | HTTP・バリデーション・認可・DB操作すべて | リクエストを受けてServiceに渡し、レスポンスを返すだけ |
| 依存関係 | `Post`モデルに直接依存 | `PostRepositoryInterface`という抽象に依存（DI） |

## まとめ

Fat Controllerは「動く」という点では問題ないが、機能が増えるほど1つのメソッドが肥大化し、
どこに何が書いてあるか把握しづらくなる。Repository/Serviceパターンで責務を分離することで、

- コントローラーは「HTTPの入出力」だけに専念できる
- ビジネスロジック（Service）はHTTPを意識せず単体でテスト・再利用できる
- データアクセス（Repository）の実装を後から差し替えやすくなる（例: 将来Eloquentから別のORMに変更する場合も、Serviceのコードは変えずに済む）

という利点が得られる。
