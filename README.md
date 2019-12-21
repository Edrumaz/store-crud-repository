<p>Please check the official laravel installation guide for server requirements before you start. <a href="https://laravel.com/docs/6.x"> Official Documentation. </a></p>

<p> Clone the repository </p>
<code> git clone https://github.com/elaniin/jw-web.git </code>
<p>Switch to the repo folder </p>
<code> cd jw-web </code>
<p> Install all the dependencies using composer </p>
<code> composer install </code>
<p> Copy the example env file and make the required configuration changes in the .env file </p>
<code> cp .env.example .env </code>
<p> Run the database migrations (Set the database connection in .env before migrating) </p>
<code> php artisan migrate </code>
<p> Install dependencies </p>
<code> composer install </code>
<p> Start the local development server </p>
<code> php artisan serve </code>
<p> You can now access the server at http://127.0.0.1:8000/ </p>

