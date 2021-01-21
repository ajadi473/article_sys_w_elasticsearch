### Running the server locally

1. Install all dependencies - <code>composer install</code>

2. Copy and rename <code>.env.example</code> to <code>.env</code>

3. Add your database configuration to <code>.env</code>
    
4. Run <code>php artisan key:generate</code>
    
5. Run <code>php artisan migrate --seed</code>

6. Start up the server - <code>php artisan serve</code>

7. Server should be running on http://localhost:8000

