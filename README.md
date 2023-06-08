<h1 style="text-align: center">APPLICATION MULTI-AUTH</h1>
<p style="text-align: center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Description
This is a small multi-authentication application that will authenticate against two different user tables.

## Setup
- Copy and rename laravel-multi-auth/.env.example to laravel-multi-auth/.env
- Make the necessary configurations like the database, smtp, etc. in laravel-multi-auth/.env
- Create a database in mysql with the same database name that you configured in your application (CREATE DATABASE <<your_database_name>>;)

## Install

Run the following laravel artisan commands: 
- php artisan migrate
- php artisan db:seed

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
