お問合せフォーム

## 環境構築 

１）Dockerの設定
　1:  ギットのクローン
　　  $git clone git@github.com:coachtech-material/laravel-docker-template.git
    2: 名前変更
         $ mv laravel-docker-template test-contact-form
    3:  dockerをビルド
     　$ docker-compose up -d --build
    4:   mac環境の場合『　docker-compose.yml　』ファイルのの変更が必須
　　　mysqlのserviseにて　　　　
　　　platform: linux/amd64　　　を追加する

2)Laravel の環境構築
    1:  laravelパッケージのインストール
　   $ docker-compose exec php bash
　　$ composer install

   2: .env.example　を使用して .envファイル作成し環境変数を変更

   3: .　phpを使用するためキーを作成
      $ docker-compose exec php bash
         php artisan key:generate
        php artisan config:clear
3)テーブル作成
　php artisan make:migration create_contacts_table
　php artisan make:migration create_categories_table

4)リレーション
　php artisan make:model Contact
　php artisan make:model Category


4)ダミーデータ作成
  php artisan make:factory ContactFactory
　php artisan make:seeder ContactsTableSeeder 

3)認証機能
　composer require laravel/fortify
   php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
   php artisan migrate
  composer require laravel-lang/lang:~7.0 --dev
 cp -r ./vendor/laravel-lang/lang/src/ja ./resources/lang/
php artisan make:controller AuthController

 ## 使用技術(実行環境)

・Docker. Ver 27.3.1
・php:PHP 7.4
・Homebrew　Server version: 9.0.1 
・mysql  Ver 8.0.26 for Linux on x86_64
・nginx version: nginx/1.21.1

## ER図 
<img width="812" alt="スクリーンショット 2024-12-24 23 08 50" src="https://github.com/user-attachments/assets/e9d71240-254e-4d4e-b970-f731da998b8d" />

## URL - 開発環境：http://localhost/
