# ROLES

Teacher, Student, Admin, Registered

Intalamos un paquete pra gestion de roles

comando:
composer require spatie/laravel-permission

publicar las migraciones:
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

Instalar las migraciones:
php artisan migrate

Creamos la siembra de las tuplas:
php artisan make:seeder RolSeeders

database/seeder -> RolSeeder.php
creamos los roles:

``
Role::create([
'name' => 'Admin',
]);
``
