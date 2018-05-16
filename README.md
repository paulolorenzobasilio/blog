# Blog

Simple blog application with CRUD. It is made in Laravel 5.6 and uses SQLite database.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and 
testing purposes.

### Prerequisites

* PHP >= 7.0
* Composer

### Installing

Clone the project
```
git clone https://github.com/paulolorenzobasilio/blog.git
```

Access the project directory
```
cd blog
```

Install the composer dependencies
```
composer install
```

Create SQLite Database
```
touch database/database.sqlite
```

Migrate the table and seeds
```
php artisan migrate:refresh --seed
```

Herein you might encounter **Application in Production!** prompt
just type yes
```
yes
```

Or change the app environment into local or create your own .env file
```
go to config->app.php
change from 'env' => env('APP_ENV', 'production') into 'env' => env('APP_ENV', 'local') 
```

Run the server
```
php artisan serve
```

Access the server.
```
http://127.0.0.1:8000
```

##
Now you can test the simple blog application.
