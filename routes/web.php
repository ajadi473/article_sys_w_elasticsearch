<?php

use App\Models\CashOut;
use App\Models\User;
use App\Models\Profile;
use App\Models\tasks;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

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
    $u = User::all();
    $c = CashOut::where('status', '!=','Success')->get();
    $c1 = CashOut::all();
    return view('welcome',['u'=> $u,'c'=>$c,'c1'=>$c1]);
});

Route::get('/dashboard', function () {
    $u = User::with('profile','coupon_plan')->get();

    return view('dashboard',['u'=> $u]);
})->middleware(['auth'])->name('dashboard');

Route::get('/cashout', function () {

    $c = CashOut::where('status', '!=','Success')->get();
    $c1 = CashOut::all();

    return view('cashouts',['c'=>$c,'c1'=>$c1]);
})->middleware(['auth'])->name('cashout');

Route::get('/tasks', function () {
    $t = tasks::all();

    return view('tasks',['t'=>$t,]);
})->middleware(['auth'])->name('tasks');

Route::get('/contactus', function () {

    $c = CashOut::where('status', '!=','Success')->get();
    $c1 = CashOut::all();

    return view('cashouts',['c'=>$c,'c1'=>$c1]);
})->middleware(['auth'])->name('contactus');

Route::put('/update_cashout', function (Request $request, CashOut $cashout) {
    $update = CashOut::query()->where('user_id',$request->id)->update([
        'status'=>$request->status,
     ]);

    return \Redirect::back();
})->name('update_cashout');

Route::put('/update_designation', function (Request $request, CashOut $cashout) {
    $update = User::query()->where('id',$request->id)->update([
        'designation'=>$request->new_designation,
     ]);

    return \Redirect::back();
})->name('update_designation');

Route::put('/add_tasks', function (Request $request, tasks $tasks) {

    if (($request->task_start) == 'today')
        $start_value = Carbon::now()->format('Y-m-d');
    else if(($request->task_start) == 'tomorrow'){
        $start_value = Carbon::now()->addDays(1)->format('Y-m-d');
    }
    tasks::create([

        'task_type' => $request->task_type,
        'author'=> $request->task_author,
        'title' => $request->task_title,
        'image' => $request->task_image,
        'text' => $request->task_text,
        'starts_on' => $start_value,
    ]);

    return \Redirect::back();
})->name('add_tasks');

require __DIR__.'/auth.php';
