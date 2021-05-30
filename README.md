# proyectoDSS

Los datos de usuario se encuentran en el txt de docs, asi como el UML y los mockups.
La mayor novedad respecto a la anterior entrega se encuentra en los CRUD, sobretodo en otros en los UPDATE.


git config --global user.name "josemicarrion99"
git config --global user.email "jmcp25@alu.ua.es"

php artisan migrate --seed // para llenar las tablas del phpmyadmin

php artisan make:migration create_artwork_table --create=artwork //crear tabla

php artisan migrate:rollback //deshace ultimo set de migraciones
php artisan migrate:status //ver estado

php artisan migrate //lanza las migraciones

php artisan make:model Artwork -m //crea migracion CreateArtworksTable y model Artwork.php


¿Cómo ejecutar la API despues de clonar el repositorio?
1º) Instalar las dependencias: 
    composer install
2º) Copiar el archivo .env.example a un nuevo archivo .env:
    cp .env.example .env
3º) Editar el archivo .env con las contraseñas de la BD y la IP del servidor, etc.
4º) php artisan key:generate
