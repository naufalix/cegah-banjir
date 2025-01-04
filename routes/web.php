<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/post/{post:slug}', [BlogController::class, 'post']);

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// DASHBOARD
Route::group(['prefix'=> 'dashboard','middleware'=>['auth']], function(){
  Route::get('/', [DashHome::class, 'index']);
  Route::get('/dashboard', [DashHome::class, 'index']);
  Route::get('/division', [DashDivision::class, 'index']);
  Route::get('/faq', [DashFaq::class, 'index']);
  
  Route::post('/division', [DashDivision::class, 'postHandler']);
  Route::post('/faq', [DashFaq::class, 'postHandler']);
});

// API
Route::group(['prefix'=> 'api'], function(){
  Route::get('division/{division:id}', [APIController::class, 'division']);
});
