#<ins>FashionablyLate(お問い合わせフォーム)</ins>

## Dockerのビルド 
 1. $git clone git@github.com:coachtech-material/laravel-docker-template.git<br>
 2. 名前変更<br>
    $ mv laravel-docker-template test-contact-form<br>
 3. dockerをビルド<br>
    $ docker-compose up -d --build<br>
 4. mac環境の場合『　docker-compose.yml　』ファイルのの変更が必須<br>
  ```
　　mysql:
    platform: linux/x86_64(この文追加)
    image: mysql:8.0.26
    environment:
  ```

### Laravel の環境構築
1. $ docker-compose exec php bash<br>
2.$ composer install<br>
3.「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

4. phpを使用するためキーを作成
 ```
$ php artisan key:generate
```
5.マイグレーションの実行
```
php artisan migrate
```
6.シーディングの実行
```
php artisan db:seed
```

 ## 使用技術(実行環境)

・Docker. Ver 27.3.1<br>
・php:PHP 7.4<br>
・Homebrew　Server version: 9.0.1 <br>
・mysql  Ver 8.0.26 for Linux on x86_64<br>
・nginx version: nginx/1.21.1<br>

## ER図 

<img width="834" alt="スクリーンショット 2025-01-12 17 19 40" src="https://github.com/user-attachments/assets/d22e29fd-8ce2-45aa-9287-fdac0db91916" />

## URL -
開発環境：http://localhost/<br>
phpMyAdmin:：http://localhost:8080/
