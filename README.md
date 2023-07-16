<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/mtaopp/laravel-fortify/blob/main/public/svg/logo.svg" width="400"></a></p>

## About this Repo

This Project is build on Laravel, using fortify and tailwindcss(with the Just in Time method).
In this Readme i'll show you how to setup this enviroment for
your own Project.

- Install Laravel (using curl)
    - install phpmyadmin (docker-compose.yml)
    - activate protected Route (app/Providers/RouteServiceProviders)
    - install Fortify (using composer)
    - install Tailwind (using npm)


## Installing Laravel

# Standart Laravel Installation
Open up a folder in which you want your new project.
*change ProjectName to the name of your project

Run in Terminal:

    $ curl -s "http://laravel.build/ProjectName" | bash

# Add phpmyadmin to the docker-compose.yml
Open up the docker-compose.yml and add following lines. (e.g after the mysql service)

    phpmyadmin:
        image: phpmyadmin/phpmyadmin:5
        ports:
            - 8080:80
        links:
            - mysql
        environment:
            PMA_HOST: mysql
            PMA_PORT: 3306
        depends_on:
            mysql:
                condition: service_healthy
        networks:
            - sail

# Activate protected routes
To write shorter Routes using methods like 
Route::get('/home', 'HomeController@index')

Open up app/Providers/RouteServiceProviders
search for 

    // protected $namespace = 'App\\Http\\Controllers';

activate it by deleting the //

# Install Laravel Fortify
Run in Terminal:

    $ sail composer require laravel/fortify
    $ sail artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
    $ sail artisan migrate

# Install Tailwindcss
Run in Terminal:

    $ sail npm install -D tailwindcss@latest postcss@latest autoprefixer@latest
    $ sail npx tailwindcss init

# Configure Tailwindcss
Open the tailwind.config.js and change it to:
    
    module.exports = {
        mode: 'jit',
        purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './public/**/*.html',
        './src/**/*.{js,jsx,ts,tsx,vue}',
        ],
        darkMode: false, // or 'media' or 'class'
        theme: {
        extend: {},
        },
        variants: {
        extend: {},
        },
        plugins: [],
    }

# Adept the webpack.mix.js
Open up the webpack.mix.js change it to:
    
    mix.js("resources/js/app.js", "public/js")
        .postCss("resources/css/app.css", "public/css", [
            require("tailwindcss"),
    ]);

# Implement Tailwindcss into the app.css
Open up /resources/css/app.css and add following lines on top:
    
    @tailwind base;
    @tailwind components;
    @tailwind utilities;

Run in Terminal:

    $ sail npm run dev

## How to work with Tailwindcss Jit
Jit (Just in time), creates all the necessary classes everytime
we run: sail npm run dev or sail npm run watch.
So to use it efficiently we use sail npm run watch.
Then after we change a class of an element we only need to refresh the
page and the tailwindcss will take its place.
    $ sail npm run watch
