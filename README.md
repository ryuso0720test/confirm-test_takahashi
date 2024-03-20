# アプリケーション名：お問い合わせフォーム

## Docker ビルド

1. git clone https://github.com/ryuso0720test/confirm-test.git
2. docker-compose up -d --build

\*MySQL は、OS によって起動しない場合があるのでそれぞれの PC にあわせて docker-compose.yml ファイルを編集してください。

## Laravel 環境構築

1. docker-compose exec php bash
2. composer install
3. .env ファイルの編集
4. php artisan migrate
5. php artisan db:seed

## 使用技術

- PHP 7.4.9
- Laravel 8.83.27
- mysql:8.0.26
- nginx:1.21.1

## URL

- 開発環境： http://localhost/
- phpMyAdmin：http://localhost:8080/

## ER 図

![test](https://github.com/ryuso0720test/confirm-test/assets/155881611/a7cef40b-28b4-4dff-beac-e9744b410305)

