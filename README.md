# proyectoDSS

git config --global user.name "josemicarrion99"
git config --global user.email "jmcp25@alu.ua.es"

php artisan migrate --seed // para llenar las tablas del phpmyadmin

php artisan make:migration create_artwork_table --create=artwork //crear tabla

php artisan migrate:rollback //deshace ultimo set de migraciones
php artisan migrate:status //ver estado

php artisan migrate //lanza las migraciones

php artisan make:model Artwork -m //crea migracion CreateArtworksTable y model Artwork.php


ALTER TABLE <name> AUTO_INCREMENT = 1;
