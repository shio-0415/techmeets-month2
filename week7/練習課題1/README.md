# 練習課題1: 商品管理システム

商品のCRUD機能を持つLaravelアプリケーションです。

## テーブル定義: products

| カラム名 | 型 | 説明 |
|---|---|---|
| id | bigint | 主キー |
| name | string | 商品名 |
| price | decimal(10,2) | 価格 |
| description | text | 説明 |
| stock | integer | 在庫数 |
| category | string | カテゴリー |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |

## 機能

- 商品一覧表示（ページネーション付き）
- 商品詳細表示
- 商品登録
- 商品編集
- 商品削除
- バリデーション実装

## 起動方法

```bash
docker compose up -d
docker compose exec app php artisan migrate
```

http://localhost:8082/products にアクセス
