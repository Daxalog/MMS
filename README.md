composer update

copy .env.example and rename to .env
fill in your database info

php artisan key:generate
php artisan migrate
php artisan storage:link