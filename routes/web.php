<?php

use App\Models\Listing;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes or your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//show all listings
Route::get('/', [ListingController::class, 'index']);

//show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//creating a store route it gets information from the form and stores it in the database.
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

//show edit form 

Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//update Listing

Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');
//delete a listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//show single listing
 Route::get('/listings/{listing}', [ListingController::class,'show']);
 Route::post('/users',[UserController::class,'store']);
 //show register create file 

 Route::get('/register',[UserController::class,'create'])->middleware('guest');
 
 Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

 Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
 
 Route::post('/users/authenticate',[UserController::class,'authenticate']);
