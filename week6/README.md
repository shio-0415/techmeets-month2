# Laravel Docker App

Docker上でLaravel環境を構築した week6 の課題です。

## 起動方法

```bash
docker compose up -d
docker compose exec app php artisan migrate
```

http://localhost:8080 にアクセス
