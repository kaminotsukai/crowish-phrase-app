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


