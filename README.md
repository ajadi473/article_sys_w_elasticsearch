### Running the server locally

1. Install all dependencies - <code>composer install</code>

2. Copy and rename <code>.env.example</code> to <code>.env</code> or run <code>cp .env.example .env </code>

3. Modify the database configuration for <code>.env</code> file
    
4. Run <code>php artisan key:generate</code>
    
5. Run <code>php artisan migrate --seed</code>

6. Run <code>composer install</code> to install dependencies

7. Start up the server - <code>php artisan serve</code>

8. Server should be running on http://localhost:8000

9. Access the API via http://127.0.0.1:8000/api/documentation

10. Access the API on Heroku via http://game-catalog-hmo-assessment.herokuapp.com/api/documentation

### Thought process building the application

1. The API has two tables. 1 - The players, 2 - The gamepays

2. Since I am to assume  each game only allows a maximum of 4 players, and there are 5 games with different versions, a player can play any of the games as long as the team does not exceed 4. With 10,000 players, a maximum of 2500 games can be played for a particular game version per day.

3. Assumption 2: Players can only play together if they have the same game versions: Mortal Combat 4 players can not play together with Mortal Combat 5 player.

4. With the assumptions, I ran a seeder file to generate 10,000 players and for each player a nested loop was written to generate random games, game versions and game plays for a maximum of 4 games per player.