##deploy

git clone
composer install
cp .env.example .env
php artisan storage:link
php artisan test
php artisan serve
go to {{url}} you can get who take the N highest salary