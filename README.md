# LaravelによるCRUD開発入門ハンズオン

- [【Crowish勉強会】自己紹介](https://qiita.com/kami_tsukai/private/fe4a0219fb05a170035b)
- [GCPで環境を作る](https://qiita.com/kami_tsukai/private/a4d0dbc7d0708f00e963)
- [【Crowish勉強会】名言アプリを作る （〜実践 - 登録処理〜）](https://qiita.com/kami_tsukai/private/02cb68cbabc5a6955ee4)
- [【Crowish勉強会】名言アプリを作る （〜実践 - 一覧取得〜）](https://qiita.com/kami_tsukai/private/8161c35cc1897784f9c5)
- [【Crowish勉強会】名言アプリを作る （〜実践 - 更新処理〜）](https://qiita.com/kami_tsukai/private/33c4d623511e9a87b5a9)

## 準備(Dockerで始める) ※ GCPが使用できない方

```
$ git clone -b starter https://github.com/kaminotsukai/crowish-phrase-app.git

$ cd crowish-phrase-app

$ docker-compose up -d

$ composer install

$ npm install

$ cp .env.example .env

$ php artisan key:generate
```

```env:.env
DB_CONNECTION=mysql
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=my_user
DB_PASSWORD=my_password
```

http://localhost:3000


