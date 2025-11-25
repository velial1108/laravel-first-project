<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MyTownController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Admin\Post\{IndexController as IndexControllerAdmin};
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
//use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;

Route::get('/', function () {
    return redirect()->route('main.index');
});

Route::get('/my-page', [MyPlaceController::class, 'index']
);




///Роуты с именем для правильного поиска



Route::group(['prefix' => 'admin'], function () {
    Route::group([], function () {
        Route::get('/post', IndexControllerAdmin::class)->name('admin.post.index');
    });
});

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');


Route::group([], function () {
    //CRUD
    //Read
    Route::get('/posts', IndexController::class)->name('post.index');
    //Create форма
    Route::get('/posts/create', CreateController::class)->name('post.create');
    //хранилище действий
    Route::post('/posts', StoreController::class)->name('post.store');
    //работа с отдельным постом
    Route::get('/posts/{post}', ShowController::class)->name('post.show');
    Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
    Route::delete('/posts/{post}', DestroyController::class)->name('post.delete');
});

//Route::get('/posts/update', [PostController::class, 'update']);
//Route::get('/posts/delete', [PostController::class, 'delete']);
//Route::get('/posts/restore', [PostController::class, 'restore']);
//Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
//Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);
//Customers CRUD
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customer.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::patch('/customers/{customer}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customer.delete');



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
