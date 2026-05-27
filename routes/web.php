<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin-login','admin-login');

Route::post('admin-login',[AdminController::class,'admin']);

Route::get('dashboard',[AdminController::class,'dashboard']);

Route::get('admin-categories',[AdminController::class,'categories']);

Route::get('delete-category/{id}',[AdminController::class,'deleteCategories']);

Route::get('add-quiz',[AdminController::class,'addQuiz']);

Route::post('add-mcqs',[AdminController::class,'addMcqs']);

Route::post('add-categories',[AdminController::class,'categoriesData']);

Route::get('logout',[AdminController::class,'logout']);
