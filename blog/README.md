<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Passaggi svolti

- Creazione database.
![database](public/images/schemaER.jpg)
- Creazione modelli + migrations
```
php artisan make:model <Modelname> -m
-m creates migration
```
- Collegare il progetto al database
```
DB_DATABASE in .env file
```
- Creazione layout.blade.php
- Creazione views
- Creazione controllers
```
php artisan make:controller <ControllerName>
ex. ArticleController
```
- Impostare i routes in web.php file
- Creazione functions in controller

