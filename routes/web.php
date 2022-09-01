<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookissueController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryauthorityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;


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


Auth::routes();

Route::get('/', [FrontendController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/admin', [FrontendController::class, 'admin']);

// users
Route::post('/add/users', [HomeController::class, 'add_users']);




//Category
Route::get('/category', [CategoryController::class, 'category']);
Route::post('/category/insert', [CategoryController::class,'insert']); 
Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete']);
Route::get('/category/edit/{category_id}', [CategoryController::class,'edit']);
Route::post('/category/update', [CategoryController::class, 'update']);
//Route::get('/category/restore/{category_id}', [CategoryController::class,'restore']); 
//Route::get('/category/permanent/delete/{category_id}', [CategoryController::class,'p_delete']);


//Author
Route::get('/author',[AuthorController::class, 'author']);
Route::post('/author/insert',[AuthorController::class,'insert']);
Route::get('/author/delete/{author_id}', [AuthorController::class, 'delete']);
Route::get('/author/edit/{author_id}', [AuthorController::class,'edit']);
Route::post('/author/update',[AuthorController::class, 'update']);


//Publisher
Route::get('/publisher', [PublisherController::class, 'publisher']);
Route::post('/publisher/insert',[PublisherController::class,'insert']);
Route::get('/publisher/delete/{publisher_id}',[PublisherController::class,'delete']);
Route::get('/publisher/edit/{publisher_id}',[PublisherController::class, 'edit']);
Route::post('/publisher/update', [PublisherController::class, 'update']);
//Route::get('/publisher/permanent/delete/{publisher_id}', [PublisherController::class,'p_delete']);
//Route::get('/publisher/restore/{publisher_id}',[PublisherController::class,'restore']);


//Book
Route::get('/book', [BookController::class, 'book']);
Route::post('/book/insert', [BookController::class, 'insert']);
Route::get('/book/delete/{book_id}', [BookController::class, 'delete']);
Route::get('/book/edit/{book_id}', [BookController::class, 'edit']);
Route::post('/book/update', [BookController::class, 'update']);
Route::post('/book/status', [BookController::class, 'book_status']);

//Student
Route::get('/student', [StudentController::class,'student']);
Route::post('/student/insert',[StudentController::class, 'insert']);
Route::get('/student/delete/{student_id}',[StudentController::class, 'delete']);
Route::get('/student/edit/{student_id}',[StudentController::class, 'edit']);
Route::post('/student/update', [StudentController::class, 'update']);

//Book Issue
Route::get('/issue', [BookissueController::class,'issue']);
Route::post('/issue/insert',[BookissueController::class, 'insert']);
Route::get('/issue/delete/{issue_id}',[BookissueController::class, 'delete']);
Route::get('/issue/edit/{issue_id}',[BookissueController::class, 'edit']);
Route::post('/issue/update', [BookissueController::class, 'update']);


//Authority
Route::get('/authority', [LibraryauthorityController::class,'management']);
Route::post('/authority/insert',[LibraryauthorityController::class, 'insert']);
Route::get('/authority/delete/{authority_id}',[LibraryauthorityController::class, 'delete']);
Route::get('/authority/edit/{authority_id}',[LibraryauthorityController::class, 'edit']);
Route::post('/authority/update', [LibraryauthorityController::class, 'update']);


//profile
Route::get('/profile/edit', [ProfileController::class, 'profile']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::post('/password/update', [ProfileController::class, 'pass_update']);
Route::post('/photo/change', [ProfileController::class, 'photo_edit']); 