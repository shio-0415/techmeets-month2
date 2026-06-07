# Laravel Docker 環境

## 必要なもの
- Docker Desktop
- Git

## セットアップ手順

1. リポジトリをクローン
git clone https://github.com/shio-0415/techmeets-month2.git
cd techmeets-month2

2. .envファイルを作成
cp .env.example .env

3. コンテナを起動
docker compose up -d

4. Laravelをセットアップ
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate

## アクセス先
- Laravel: http://localhost:8080
- phpMyAdmin: http://localhost:8081

## コンテナ停止
docker compose down
