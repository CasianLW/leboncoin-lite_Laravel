<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Leboncoin-lite Laravel

Ceci est un petit projet CRUD qui permet de poster/supprimer des annonces tout en validant ces actions par les utilisateurs via mail (Mailtrap).

-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Project steps

### Backend & basic front

1. install laravel
   composer create-project --prefer-dist laravel/laravel project-name

2. link database on .env

3. creer table migrations
   php artisan make:migration create_annonces_table --create=annonces
   modifier le schema: avec les bonnes informations
   php artisan migrate

4. php artisan make:model Annonce
   remplir le modele d'apres les informations mises dans migrations

5. Create a seeder
   php artisan make:seeder AnnoncesSeeder
   contenu seeder:  
    maybe Faker? and a for loop for X seeds
   php artisan db:seed --class=AnnoncesSeeder

6. Create a CRUD controller:
   php artisan make:controller AnnonceController --resource
   fill the crud methods inside.

7. Create the views / blade files + layout for website.

8. Define routes:
   Route::resource('annonces', AnnonceController::class);
   maps the controller routes

9. Annonce validation controller
   php artisan make:controller ValidateAnnonceController
   create a validation method validateAnnonce($token)

10. Route to /annonce/{token}
    New route and validate controller on it

11.Link Mailtrap by adding .env values

12. Creer mail method
    php artisan make:mail ConfirmationAnnonce
    fill with methods inside (see git)
    send it on AnnonceController > store
    Mail::to($validated['email'])->send(new ConfirmationAnnonce($annonce));

13. create .blade model for the confirm mail and success confirmation
    inside /ressources/emails/annonce_validation.blade.php
    link it to /mails/ConfirmationAnnonce.php

14. Send mail method success (confirmedAnnonce) on ValidateAnnonceController's store success
    send it on ValidateAnnonceController > validateAnnonce($token)

15. create .blade model for the success confirmation
    inside /ressources/emails/annonce_validated.blade.php
    link it to /mails/ConfirmedAnnonce.php

16. Create a new method inside AnnonceController
    deleteViaMail()
    fill it and send mail on success
    Link it to new route get->'/annonces/delete/{token}'

17. create /mail/ for confirmedDeletedAnnonce
    fill it with mail infos and link to blade

18. create .blade model for the confirmed deleted annonce mail
    inside /ressources/emails/annonce_deleted.blade.php
    link it to /mails/ConfirmedDeletedAnnonce.php

    Should work :)

### More complex front

1. Be creative
2. Have fun

## License

[MIT license](https://opensource.org/licenses/MIT).
