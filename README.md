<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Leboncoin-lite Laravel

Ceci est un petit projet CRUD qui permet de poster/supprimer des annonces tout en validant ces actions par les utilisateurs via mail (Mailtrap).

-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Project steps

1.install laravel
composer create-project --prefer-dist laravel/laravel project-name

2.link database on .env

3.creer table migrations
php artisan make:migration create_annonces_table --create=annonces
modifier le schema: avec les bonnes informations
php artisan migrate

4.php artisan make:model Annonce
remplir le modele d'apres les informations mises dans migrations

5.php artisan make:seeder AnnoncesSeeder
contenu seeder:  
 maybe Faker? and a for loop for X seeds
php artisan db:seed --class=AnnoncesSeeder

6.

## License

[MIT license](https://opensource.org/licenses/MIT).
