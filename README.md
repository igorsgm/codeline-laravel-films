# Laravel Films

This project covers RESTful API, DB, auth and form functionality in Laravel. The project consists in a Backend which implements a RESTful API to manage films. 

##### Main Screen

![Laravel Films](https://raw.githubusercontent.com/igorsgm/laravel-films/master/CodelineLaravelFilms.png)

## Getting Started and Installing

```
git clone https://github.com/igorsgm/laravel-films.git

cd laravel-films

composer install
```

Then you will have to create .env file by copying .env.example content and changing it's variables. In this step you must configure your database environment (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD).
After doing this, execute the following commands

```
php artisan key:generate

php artisan migrate --seed
```

Now you are ready to access the application:

```
php artisan serve
```

### API Routes

If you want to see a complete list of existent routes inside the application, run the following command in another terminal tab:

```
php artisan route:list
```

You can also use [Postman](https://www.getpostman.com/) ( a complete API development environment, for API developers) by importing [postman_collection.json](https://github.com/igorsgm/laravel-films/blob/master/postman_collection.json) after downloading the program.
By doing this, you can see the list of routes in api and test their operation.

![API Routes](https://raw.githubusercontent.com/igorsgm/laravel-films/master/CodelineLaravelFilms-routes.png) 

## Built With

* [Laravel](https://laravel.com/docs/5.7/) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP 

## Author

* **Igor Moraes** - *All work* - [igorsgm](https://github.com/igorsgm)
