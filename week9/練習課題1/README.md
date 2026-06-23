# 練習課題1: タスク管理アプリ（最初からRepository/Serviceパターンで構築）

プロジェクト・タスク・タグ・コメントを管理するタスク管理アプリです。最初から Repository/Service パターンで設計しました。

## データ構造
## 設計

- `app/Repositories/Contracts/` … ProjectRepositoryInterface, TaskRepositoryInterface
- `app/Repositories/` … ProjectRepository, TaskRepository（実装）
- `app/Services/` … ProjectService, TaskService（ビジネスロジック）
- `app/Http/Requests/` … StoreProjectRequest, StoreTaskRequest（バリデーション分離）
- `app/Providers/AppServiceProvider.php` … インターフェースと実装のDIバインディング

## リレーションの実装ポイント

### belongsToMany（多対多）
タスクとタグは中間テーブル `task_tag` を介した多対多関係。

```php
// Task.php
public function tags()
{
    return $this->belongsToMany(Tag::class, 'task_tag');
}
```

タグはカンマ区切りのテキスト入力から `firstOrCreate` で取得・作成し、`sync()` で中間テーブルを更新している（`TaskService::resolveTagIds()`）。

### hasManyThrough
プロジェクトに直接コメントが紐づいているわけではなく、Task経由でCommentに紐づいている。`hasManyThrough` を使うことで、中間のTaskを意識せずプロジェクトから一括でコメント一覧を取得できる。

```php
// Project.php
public function comments()
{
    return $this->hasManyThrough(Comment::class, Task::class);
}
```

### N+1問題対策
- プロジェクト一覧: `withCount('tasks')` でタスク数を事前集計（一覧画面でタスク数を出すためにループ内で都度クエリを発行しない）
- プロジェクト詳細: `with(['tasks.tags', 'comments'])` でタスク・タグを事前読み込み

## 起動方法

```bash
docker compose up -d
docker compose exec app php artisan migrate
```

http://localhost:8092/ にアクセス
