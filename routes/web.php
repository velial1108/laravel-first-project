<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MyTownController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;

Route::get('/', function () {
    return 'aaaaa';
});

Route::get('/my-page', [MyPlaceController::class, 'index']
);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);




Route::get('/customers', [CustomerController::class, 'index']
);
Route::get('/my-town', [MyTownController::class, 'index']);
Route::get('my-hobby', function (){
    return 'Programming';
});
Route::get('/my-samara-car', function(){
    return 'lohan';
});
Route::get('/my-modal-processor', function (){
    return 'intel core i7 8700';
});
