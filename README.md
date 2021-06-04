Steps to run the application

1) Clone the application from repo using 'git clone git@github.com:abhilashanil/laravel-demoapp.git'

2) From the root of the application run the command 'composer install'

4) Generate app ket by using command 'php artisan key:generate'

3) Create a database named 'demo_app_laravel'

4) Rename the file .env.example to .env

5) Update the following values in .env DB_DATABASE, DB_USERNAME, DB_PASSWORD based on your DB configuration

6) From the root of application run the command 'php artisan migrate'

7) From the root of application run the command 'php artisan serve' to start the server