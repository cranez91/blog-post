# BlogPost

A Comment System single-page web application using Laravel 9, VueJS, Tailwind CSS and MySql. There is only one Blog Post that can be commented on.

## Prerequisites

Make sure you have the following prerequisites installed on your system:

- PHP (version ^8.0)
- Composer (version ^2.0.8)
- Node.js (version ^20.4.0)
- MySQL 

## Installation

Follow these steps to install and set up the project locally:

1. Clone the repository:

   git clone https://github.com/cranez91/blog-post.git

2.- Navigate to the project directory
   
    cd blog-post

3.- Install PHP dependencies with Composer:

    composer install
    
4.- Create an .env file from the .env.example file and configure the necessary environment variables (e.g., database connection).

5.- Generate a unique application key

    php artisan key:generate

6.- Run the migrations to create the database tables:

    php artisan migrate

7.- Install JavaScript dependencies with npm:

    npm install

8.- Compile the assets:

    npm run dev

9.- Start the Laravel development server:

    php artisan serve
    
10.- Open your web browser and navigate to http://localhost:8000 (or the port shown in the console).

11.- (Optional) Run the tests:

    php artisan test --env=testing
