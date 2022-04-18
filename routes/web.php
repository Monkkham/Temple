<?php

use App\Http\Livewire\Logout;
use App\Http\Livewire\Laryhub;
use App\Http\Controllers\Login;
use App\Http\Livewire\Laryjaiy;
use App\Http\Livewire\Dashboard;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;

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
Route::resource('/', Login::class);
Route::resource('/login', Login::class);
// Route::get('/dashboard', App\Http\Livewire\Dashboard::class)->name('dashboard');
Route::group(['middleware' => ['auth']], function()
{

    Route::get('/logout',[Logout::class,'logout'])->name('logout');
    Route::get('/dashboard', App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/laryjaiy', App\Http\Livewire\Laryjaiy::class)->name('laryjaiy');
    Route::get('/laryhub', App\Http\Livewire\Laryhub::class)->name('laryhub');
});

