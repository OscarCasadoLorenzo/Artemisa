# proyectoDSS

git config --global user.name "josemicarrion99"
git config --global user.email "jmcp25@alu.ua.es"


php artisan make:migration create_artwork_table --create=artwork //crear tabla

php artisan migrate:rollback //deshace ultimo set de migraciones
php artisan migrate:status //ver estado

php artisan migrate //lanza las migraciones


