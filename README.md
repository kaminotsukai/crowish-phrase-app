## 概要
- Laravelで開発されていますので、フォルダ構成などの基本的な部分に関しては[ドキュメント](https://readouble.com/laravel/)を参照してください
- フロントエンドは Vue.js で開発されており、[こちら](https://github.com/kaminotsukai/crowish-phrase-app/tree/master/resources/js)に配置されていますので、画面を開発したい場合はvueファイルを編集してください

## 機能
こちらのコードでは名言の[CRUD処理](https://e-words.jp/w/CRUD.html#:~:text=CRUD%E3%81%A8%E3%81%AF%E3%80%81%E6%B0%B8%E7%B6%9A%E7%9A%84,%E6%96%87%E5%AD%97%E3%82%92%E7%B9%8B%E3%81%92%E3%81%9F%E8%AA%9E%E3%80%82)を行っております。以下の機能が開発対象になります。

- 名言一覧API
- 名言詳細API
- 名言登録API
- 名言更新API
- 名言削除API

名言は以下の要素を含んでいます。
- ID
- 名言を言った人の名前
- 名言



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


