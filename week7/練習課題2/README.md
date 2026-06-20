# 練習課題2: 予約システム

イベント予約管理システムです。

## テーブル定義

### events
| カラム名 | 型 | 説明 |
|---|---|---|
| id | bigint | 主キー |
| title | string | イベント名 |
| description | text | 説明 |
| date | datetime | 開催日時 |
| capacity | integer | 定員 |

### reservations
| カラム名 | 型 | 説明 |
|---|---|---|
| id | bigint | 主キー |
| event_id | bigint | イベントID（外部キー） |
| name | string | 予約者名 |
| email | string | メールアドレス |
| number_of_people | integer | 人数 |
| reserved_at | datetime | 予約日時 |

## 機能

- イベント一覧
- イベント詳細
- 予約作成（名前、メール、人数、日時）
- 予約一覧
- 予約のキャンセル

## 起動方法

```bash
docker compose up -d
docker compose exec app php artisan migrate
```

http://localhost:8084/events にアクセス
