<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->name("admin.")->group(function(){
    Route::get("/", [DashboardController::class, "index"])->middleware("role:admin,creator")->name("dashboard.index");
    Route::resource('category', CategoryController::class)->middleware("role:admin");
    Route::resource("user", UserController::class)->middleware("role:admin");
    Route::resource("news", NewsController::class)->middleware("role:creator")->except("show");
});

// Route::get("/show");
Route::resource('login', LoginController::class);
Route::resource('register', RegisterController::class);
Route::resource("comment", CommentController::class);
Route::post("/login-success", [LoginController::class, "authenticate"])->name("authenticate");

Route::resource("news", NewsController::class)->only("show");


Route::get('/', [DashboardController::class, 'indexUser'])->name("dashboard.index");
Route::get('/{category:slug}', [DashboardController::class, 'category'])->name("dashboard.category");