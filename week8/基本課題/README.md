# Week8 基本課題: 会員制ブログ

Laravel Breezeを使った認証機能付きのブログシステムです。

## 機能

- ユーザー登録・ログイン・ログアウト（Laravel Breeze）
- ログインユーザーのみ投稿可能
- 自分の投稿のみ編集・削除可能（Policyによる認可）
- 全ての投稿一覧・詳細閲覧（ログイン必須）

## セキュリティ対策

| 対策 | 実装内容 |
|---|---|
| CSRF対策 | 全フォームに `@csrf` トークンを設置 |
| XSS対策 | Bladeの `{{ }}` による自動エスケープ |
| SQLインジェクション対策 | Eloquent ORMを使用（生SQLなし） |
| パスワード管理 | Breezeが bcrypt でハッシュ化して保存 |
| Mass Assignment対策 | モデルで `$fillable` を明示 |
| 認可（authorization） | `PostPolicy` で投稿の所有者のみ編集・削除可能に制限 |
| 機密情報管理 | `.env` を `.gitignore` で除外 |

## テーブル定義: posts

| カラム名 | 型 | 説明 |
|---|---|---|
| id | bigint | 主キー |
| user_id | bigint | 投稿者（外部キー） |
| title | string | タイトル |
| content | text | 本文 |

## 起動方法

```bash
docker compose up -d
docker compose exec app php artisan migrate
npm install
npm run build
```

http://localhost:8086/register にアクセス
