
# Week7 課題: ブログシステム

Laravel の MVC パターンで作成したブログ投稿管理システムです。

## 機能

- 投稿一覧表示（ページネーション付き、5件ずつ）
- 投稿詳細表示
- 投稿作成（タイトル・内容・カテゴリー）
- 投稿編集
- 投稿削除
- バリデーション（必須項目チェック、文字数制限）
- Bladeレイアウト継承（`layouts/app.blade.php`を共通レイアウトとして使用）

## テーブル定義: posts

| カラム名 | 型 | 説明 |
|---|---|---|
| id | bigint | 主キー |
| title | string | タイトル |
| content | text | 本文 |
| category | string | カテゴリー |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |

## 画面

(ここにスクリーンショットを貼る)

## 起動方法

```bash
docker compose up -d
docker compose exec app php artisan migrate
```

http://localhost:8080/posts にアクセス