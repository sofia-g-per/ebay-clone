<?php

use App\Http\Controllers\LotController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, "index"])->name('main-page');

Route::get('/lots/{id}', [PageController::class, "single"])->name('lot-page');

Route::get('/lots/category/{id}', [LotController::class, "searchByCategory"])->name('category-search');

Route::get('/search', [LotController::class, "search"])->name('search');

Route::get('/sign-up', [PageController::class, "signup"])->name('signup-page');
Route::post('/sign-up', [UserController::class, "signup"])->name('signup');

Route::get('/login', [PageController::class, "login"])->name('login-page');
Route::post('/login', [UserController::class, "login"])->name('login');

Route::get('/logout', [UserController::class, "logout"])->name('logout');

//middleware - отвечает за запуск соответсвующего файла посредника (middleware), 
//который осуществляет прописанную в нём логику до перенаправления в addlor
//в данном случае используется для переадресации не авторизированного пользователя 
//при попытке зайти на страницу добавления поста
Route::get('/addlot', [PageController::class, "addlot"])->name('addlot-page')->middleware('customAuth');



