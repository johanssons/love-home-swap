# Company Ltd exercise

Hello and thank you for taking out your time to review my exercise. To get the job done I have used the following: 

- Laravel 5.2 https://laravel.com
- Laravel Valet (dev server) https://laravel.com/docs/5.2/valet

## Installation 

For this exercise to install and work as it should I assume you will be using an OSX operating system and have knowledge of using package management systems like NPM and Composer and you are comfortable using the terminal CLI.

You must also run the app in a server environment. I have used Laravel Valet which works well for this type of an app.

1. To get things started please clone my repository to your local environment `git clone https://github.com/johanssons/love-home-swap.git (FOLDER NAME)`
2. Copy `.env.example` to `.env`
3. `composer install`
4. `npm install`
5. `php artisan key:generate`

## Testing

To run phpunit testing use the following command from the app root directory `vendor/bin/phpunit`