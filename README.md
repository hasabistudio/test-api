###### Requirements
- Laravel 9.*
- PHP v.8.*
- Database Postgre 12.*

###### Getting started
- Copy file to web root
- run `composer install`
- run `cp .env.example .env`
- run `php artisan migrate`
- run `php artisan serve`

###### API List
1. [X] Create participant
   - ``[POST]: localhost:8000/API/participants/store``
2. [x] List Participant
   - ``[GET]: localhost:8000/API/participants``
3. [x] Detail Participant
   - ``[GET]: localhost:8000/API/participants/{id}``
4. [x] Update Participant
   - ``[POST]: localhost:8000/API/participants/{id}``
5. [x] Delete Participant
   - ``[DELETE]: localhost:8000/API/participants/{id}/delete``
