# E-Commerce Application Setup Guide

## 必要な環境
- PHP 8.4+
- Composer
- Node.js & npm
- MySQL
- Docker & Docker Compose

## セットアップ手順

### 1. リポジトリをクローン
```bash
git clone https://github.com/minnn99/e-commerce.git
cd e-commerce
```

### 2. 環境設定ファイルを作成
```bash
cd ecommerce-app
cp .env.example .env
```

### 3. .envファイルを編集
```env
APP_NAME="educure_eCommerce"
APP_ENV=local
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=sail
DB_PASSWORD=password

# Stripe設定（テスト用キー）
STRIPE_KEY=pk_test_your_publishable_key_here
STRIPE_SECRET=sk_test_your_secret_key_here
```

### 4. Dockerでアプリケーションを起動
```bash
# ルートディレクトリで実行
docker-compose up -d

# Composer依存関係をインストール
docker-compose exec laravel.test composer install

# アプリケーションキーを生成
docker-compose exec laravel.test php artisan key:generate

# データベースマイグレーション実行
docker-compose exec laravel.test php artisan migrate

# ビューキャッシュクリア
docker-compose exec laravel.test php artisan view:clear
```

### 5. アクセス確認
- メインサイト: http://localhost
- 商品一覧: http://localhost/itemlist
- 管理画面: http://localhost/admin/login

## 機能概要

### ユーザー機能
- ユーザー登録・ログイン
- 商品一覧・詳細表示
- ショッピングカート
- Stripe決済

### 管理者機能
- 商品管理（追加・編集・削除）
- ユーザー管理
- 売上管理

### ページネーション
- Bootstrap-5スタイルのページネーション
- 8件ずつ商品を表示

## トラブルシューティング

### ポート競合エラー
```bash
# 使用中のポートを確認
lsof -i :80
lsof -i :3306

# プロセスを停止してから再起動
docker-compose down
docker-compose up -d
```

### 依存関係エラー
```bash
# vendorディレクトリを削除して再インストール
rm -rf vendor
docker-compose exec laravel.test composer install
```

### Stripe設定
1. https://stripe.com でアカウント作成
2. テスト用APIキーを取得
3. .envファイルに設定

## データベース初期データ
管理者アカウント作成やテストデータ投入が必要な場合は、シーダーを実行：
```bash
docker-compose exec laravel.test php artisan db:seed
```