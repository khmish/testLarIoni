# gyms

#### If you cloned it for the first time

1. `composer install` - install laravel dependencies
2. `cp .env.example .env` - make a copy of .env.example as .env
3. `php artisan key:generate` - to generate key for cloned project
4.   `jwt generate secret` -php artisan jwt:secret
5. change .env values - DB to be precise
6. Make a database (mysql)
7. use this lib tymon/jwt-auth form github in order to use JWT auth in this website

#### If you just cloned OR database changed

-   `php artisan migrate`

#### Installing (node) dependencies

-   `npm i` - fresh (only for those who change node deps (Ibrahim))
-   OR
-   `npm ci` - as per package-lock.json

#### Building

-   `npm run dev` - development (unoptimized and dirty)
-   OR
-   `npm run prod` - production (optimized, minimized and cleaned)

#### Serving the project

-   `php artisan serve`

#### useful commands 
-   `php artisan make:seeder SeederNameTableSeeder` -create new seed
-   `php artisan db:seed --class=SeederNameTableSeeder` -seed a specific seed
-   `php artisan migrate:refresh --seed` -drop all db and then create new one w/ seed
-   `php artisan make:resource Users --collection` -create new collection
-   `php artisan code:models` -reflect the table into models
-   `composer require tymon/jwt-auth "1.0.*"` -JWT authentication
-   `composer require ifsnop/mysqldump-php"` -https://github.com/ifsnop/mysqldump-php export DB


