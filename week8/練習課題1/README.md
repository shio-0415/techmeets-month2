# 練習課題1: ログイン機能付き掲示板

匿名掲示板に認証機能を追加したアプリケーションです。

## 機能

- ユーザー登録・ログイン・ログアウト（Laravel Breeze）
- 掲示板の閲覧・投稿はログインユーザーのみ可能
- 投稿には投稿者名が表示される（匿名ではなくユーザーに紐付け）

## セキュリティ対策

- CSRF対策（`@csrf`）
- XSS対策（Bladeの自動エスケープ）
- SQLインジェクション対策（Eloquent ORM）
- 未ログインユーザーは `/board` にアクセスするとログイン画面にリダイレクト

## テーブル定義: messages

| カラム名 | 型 | 説明 |
|---|---|---|
| id | bigint | 主キー |
| user_id | bigint | 投稿者（外部キー） |
| body | text | 投稿内容 |

## 起動方法

```bash
docker compose up -d
docker compose exec app php artisan migrate
npm install
npm run build
```

http://localhost:8088/register にアクセス
