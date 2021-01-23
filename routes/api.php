<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => '',
    'as' => 'api.',
    'middleware' => ['auth:api']
], function () {
    // Route::get('all-players', function() {
    //     $users = User::all();

    //     return response()->json($users);
    // });
});

// fetch all players
Route::get('all-players', function() {
    $start = microtime(true);

    $players = DB::table('games')
            ->select('name', 'version','game_play')
            ->where('game_play', '>', 0)
            ->get();

    $time = microtime(true) - $start;
    return response()->json([
        'status' => 'success',
        'status_code' => Response::HTTP_OK,
        'data' => [
            'all_players' => $players,
        ],

        'message' => 'Information pulled out successfully'
    ])->withHeaders([
        'Content-Type' => 'json',
        'X-runtime' => $time,
    ]);
});

// fetch all games
Route::get('all-games', function() {
    $start = microtime(true);
    $games = App\Models\Games::distinct()->orderBy('date_added','asc')->get('version','date_added');
    $time = microtime(true) - $start;
    return response()->json([
        'status' => 'success',
        'status_code' => Response::HTTP_OK,
        'data' => [
            'all_games' => $games,
        ],

        'message' => 'All games fetched successfully'
    ])->withHeaders([
        'Content-Type' => 'json',
        'X-runtime' => $time,
    ]);
});

// fetch games per day
Route::get('games-per-day', function() {
    // $players = User::all();

    // $games_per_day = DB::table('games')
    //         ->select('*')
    //         ->get();
    $start = microtime(true);
    $games_per_day = App\Models\Games::distinct('date_added')
                                    ->orderBy('date_added','asc')
                                    ->select('name','date_added')
                                    ->get();
    $time = microtime(true) - $start;
    return response()->json([
        'status' => 'success',
        'status_code' => Response::HTTP_OK,
        'data' => [
            'games_per_day' => $games_per_day,
        ],

        'message' => 'All games fetched successfully'
    ])->withHeaders([
        'Content-Type' => 'json',
        'X-runtime' => $time,
    ]);
});

// games-with-range
Route::get('games-with-range', function() {
    $start = microtime(true);
    $games_per_day = App\Models\Games::where('created_at', '>',Carbon::now()->subDays(5))
                                    ->orderBy('date_added','asc')
                                    ->select('name','date_added')
                                    ->get();
    $time = microtime(true) - $start;
    return response()->json([
        'status' => 'success',
        'status_code' => Response::HTTP_OK,
        'data' => [
            'games_within_range' => $games_per_day,
        ],

        'message' => 'All games fetched successfully'
    ])->withHeaders([
        'Content-Type' => 'json',
        'X-runtime' => $time,
    ]);
});

// Top100
Route::get('top-100', function() {
    $start = microtime(true);
    
    $games_per_day = App\Models\Games::distinct('name')
                                    ->orderBy('game_play','desc')
                                    ->select('name','version','game_play')
                                    ->get()
                                    ->take(100);
    
    $time = microtime(true) - $start;
    return response()->json([
        'status' => 'success',
        'status_code' => Response::HTTP_OK,
        'data' => [
            'games_within_range' => $games_per_day,
        ],
        

        'message' => 'All games fetched successfully'
    ])->withHeaders([
        'Content-Type' => 'json',
        'X-runtime' => $time,
    ]);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
