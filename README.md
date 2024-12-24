お問合せフォーム

## 環境構築 

１）Dockerの設定<br>
　　　①  ギットのクローン<br>
         $git clone git@github.com:coachtech-material/laravel-docker-template.git<br>
    ② 名前変更<br>
         $ mv laravel-docker-template test-contact-form<br>
    ③  dockerをビルド<br>
     　$ docker-compose up -d --build<br>
　　④   mac環境の場合『　docker-compose.yml　』ファイルのの変更が必須<br>
　　　mysqlのserviseにて　<br>　　　
　　　platform: linux/amd64　　　を追加する<br>

2)Laravel の環境構築<br>
   ①  laravelパッケージのインストール<br>
　   $ docker-compose exec php bash<br>
　　$ composer install<br>

   ② .env.example　を使用して .envファイル作成し環境変数を変更<br>

   ③ .　phpを使用するためキーを作成<br>
      $ docker-compose exec php bash<br>
         php artisan key:generate<br>
        php artisan config:clear<br>
3)テーブル作成<br>
　php artisan make:migration create_contacts_table<br>
　php artisan make:migration create_categories_table<br>

4)リレーション<br>
　php artisan make:model Contact<br>
　php artisan make:model Category<br>


5)ダミーデータ作成<br>
  php artisan make:factory ContactFactory<br>
　php artisan make:seeder ContactsTableSeeder <br>

6)認証機能<br>
　composer require laravel/fortify<br>
   php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"<br>
   php artisan migrate<br>
  composer require laravel-lang/lang:~7.0 --dev<br>
 cp -r ./vendor/laravel-lang/lang/src/ja ./resources/lang/<br>
php artisan make:controller AuthController<br>

 ## 使用技術(実行環境)<br>

・Docker. Ver 27.3.1<br>
・php:PHP 7.4<br>
・Homebrew　Server version: 9.0.1 <br>
・mysql  Ver 8.0.26 for Linux on x86_64<br>
・nginx version: nginx/1.21.1<br>

## ER図 <br>
<img width="812" alt="スクリーンショット 2024-12-24 23 08 50" src="https://github.com/user-attachments/assets/e9d71240-254e-4d4e-b970-f731da998b8d" />

## URL - 開発環境：http://localhost/
