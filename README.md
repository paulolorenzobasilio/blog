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

Run the server
```
php artisan serve
```

##
Now you can test the simple blog application.
