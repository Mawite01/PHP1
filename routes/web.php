<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/users', function () {
    return " this is users";
})->name('user.index');

Route::get('/users/{id}', function ($id) {
    return "this is $id";
});

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::post('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::resource('articles',ArticleController::class);
        Route::resource('roles',RoleController::class);
        Route::resource('permissions',PermissionController::class);
        Route::resource('users',UserController::class);
        Route::get('/employee',[EmployeeController::class, 'index'])->name('employee.index');
    });

    Route::get('/', function() {
        return view('welcome');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
