<?php


use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/posts', IndexController::class);
    Route::get('/posts/create', CreateController::class);
    Route::post('/posts', StoreController::class);
    Route::get('/posts/{post}', ShowController::class);
    Route::get('/posts/{post}/edit', EditController::class);
    Route::patch('/posts/{post}', UpdateController::class);
    Route::delete('/posts/{post}', DestroyController::class);
});
