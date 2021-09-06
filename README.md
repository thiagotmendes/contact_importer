<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About System

The contact importer are a test, using MySql database and PHP Laravel.

Can you access the system here:

[Heroku App](http://thiago-contact-importer.herokuapp.com/)

```
Menu contact > show the datagrid with contact informations

Add new contact > open form to add new contact in database

Import Contacts by CSV file > open form to insert a new CSV contact file
```

Files to test provided on

```
csv-test-file
```

Install Laravel

``` composer install ```

Install UI

``` npm install ```

create a .env file to configure database

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=
```

If have problems with composer install use: 

```
COMPOSER_MEMORY_LIMIT=-1 composer install
```


