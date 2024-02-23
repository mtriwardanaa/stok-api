## Requirement
- php ^8.1
- laravel 10

## Installation

- clone github ``` git clone git@github.com:mtriwardanaa/stok-api.git ```
- ``` cd stok-api ```
- ``` composer install ```
- copy .env.example to .env
- change some .env values

```bash
  APP_NAME="stok-api" // app name
  APP_ENV=local // local, stage, production
  APP_KEY=
  APP_DEBUG=true // on production set to false
  APP_URL=http://localhost:9000 // domain app

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=stok_api
  DB_USERNAME=root
  DB_PASSWORD=

```

- ``` php artisan key:generate ```
- make sure you have created a new database with the same name as that listed in the database env file
- ``` php artisan migrate ```
- if it's your first time deploying, run ``` php artisan db:seed ```
- ```php artisan passport:keys```


## Running Project

- ``` php artisan serve ```
- import postman collection from this documentation ``` https://documenter.getpostman.com/view/8315413/2sA2rCU1kn ```

## Test Project
- ``` php artisan test ```
