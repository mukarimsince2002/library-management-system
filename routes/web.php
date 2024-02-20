<?php

use App\Http\Controllers\CatogaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MembershipTypeController;
use App\Models\Genre;
use App\Models\Membership;
use App\Models\Publisher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('user', UserController::class);
Route::resource('catogary',CatogaryController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('publishers', PublisherController::class);
Route::resource('users', UserController::class);
Route::resource('genres', GenreController::class);
Route::resource('membership',  Membership::class);
Route::resource('membership_type',  MembershipTypeController::class);


