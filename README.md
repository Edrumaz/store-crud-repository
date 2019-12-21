<p>Please check the official laravel installation guide for server requirements before you start. Official Documentation
Clone the repository
git clone https://github.com/elaniin/jw-web.git
Switch to the repo folder
cd jw-web
Install all the dependencies using composer
composer install
Copy the example env file and make the required configuration changes in the .env file
cp .env.example .env
Generate a new application key
php artisan key:generate
Generate a new JWT authentication secret key
php artisan jwt:generate
Run the database migrations (Set the database connection in .env before migrating)
php artisan migrate
Install front end dependencies
yarn install
Start the local development server
yarn watch
You can now access the server at http://localhost:3000 </p>

