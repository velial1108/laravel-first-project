<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MyTownController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;

Route::get('/', function () {
    return 'aaaaa';
});

Route::get('/my-page', [MyPlaceController::class, 'index']
);




///Роуты с именем для правильного поиска
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');






Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/restore', [PostController::class, 'restore']);
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);




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
