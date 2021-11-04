<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Repository\Eloquent\SearchRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (SearchRepository $searchRepository) {
    $articles = Article::all();
    return view('dashboard',[
        'articles'=> request()->has('q') ?
                    $searchRepository->search(request('q'))
                    : App\Models\Article::all()]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
