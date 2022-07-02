<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

Project ini merupakan sebuah test backend Laravel 8 dengan database MongoDB.

## Prerequisites

Project ini dapat dijalankan dengan menggunakan sistem sebagai berikut:

-   Laravel 8.\*
-   PHP 8.0
-   MongoDB 4.2
-   Composer 2.\*

## Installation

1. Download atau clone project dengan menggunakan `git` dengan command:

    ```
    $ git clone https://github.com/ishal12/inosoft-test
    ```

2. Kemudian masuk kedalam project yang telah anda clone dengan command:

    ```
    $ cd inosoft-test
    ```

3. Jalankan command berikut pada project anda:

    ```
    $ composer install
    ```

4. Buatlah `.env` dengan contoh yang terdapat pada `.env.example`. Kemudian isi dabatase anda seperti dibawah ini:

    ```
    DB_CONNECTION=mongodb
    DB_HOST=127.0.0.1
    DB_PORT=27017
    DB_DATABASE=<nama database>
    DB_USERNAME=<username>
    DB_PASSWORD=<password>
    ```

    Anda dapat mengisi database anda tanpa menggunakan `<` dan `>`. Penggunaan username dan password tergantung dari kebutuhan database anda.

5. Jalankan command berikut pada project anda untuk mendapatkan `APP_KEY=<secret>` pada `.env` anda.

    ```
    $ php artisan key:generate
    ```

6. Jalankan command berikut pada project anda untuk mendapatkan `JWT_SECRET=<secret>` pada `.env` anda.

    ```
    $ php artisan jwt:secret
    ```

7. Sebelum anda menjalankan command berikut pada project anda, pastikan anda telah mengaktifkan `connection` pada database `MongoDB`. Jalankan command berikut untuk mendapatkan beberapa data pada collection `motors` dan `mobils`.

    ```
    $ php artisan db:seed
    ```

8. Jalankan command berikut untuk mengaktifkan API anda.

    ```
    $ php artisan serve
    ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
