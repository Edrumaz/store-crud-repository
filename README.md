<p>Please check the official laravel installation guide for server requirements before you start. <a href="https://laravel.com/docs/6.x"> Official Documentation. </a></p>

<p> Clone the repository </p>
<code> git clone https://github.com/Edrumaz/store-crud-repository.git </code><br>
<br><p>Switch to the repo folder </p>
<code> cd store-crud-repository </code><br>
<br><p> Install all the dependencies using composer </p>
<code> composer install </code><br>
<br><p> Copy the example env file and make the required configuration changes in the .env file </p>
<code> cp .env.example .env </code><br>
<br><p>Get the aplication key </p>
<code> php artisan generate:key </code><br>
<br><p> Run the database migrations (Set the database connection in .env before migrating) </p>
<code> php artisan migrate </code><br>
<br><p> Populate the database with dummy data </p>
<code> php artisan db:seed </code><br>
<br><p> Start the local development server </p>
<code> php artisan serve </code><br>
<br><p> You can now access the server at http://127.0.0.1:8000/ </p>

