<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\DashActivity;
use App\Http\Controllers\Dashboard\DashHome;
use App\Http\Controllers\Dashboard\DashFlood;
use App\Http\Controllers\Dashboard\DashFollowUp;
use App\Http\Controllers\Dashboard\DashPost;
use App\Http\Controllers\Dashboard\DashUser;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/post/{post:slug}', [BlogController::class, 'post']);

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'index2']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

// DASHBOARD
Route::group(['prefix'=> 'dashboard','middleware'=>['auth']], function(){
  Route::get('/', [DashHome::class, 'index']);
  Route::get('/artikel', [DashPost::class, 'index']);
  Route::get('/dashboard', [DashHome::class, 'index']);
  Route::get('/kegiatan', [DashActivity::class, 'index']);
  Route::get('/lapor-banjir', [DashFlood::class, 'index']);
  Route::get('/profil', [DashUser::class, 'index']);
  Route::get('/tindak-lanjut', [DashFollowUp::class, 'index']);
  
  Route::post('/artikel', [DashPost::class, 'postHandler']);
  Route::post('/kegiatan', [DashActivity::class, 'postHandler']);
  Route::post('/lapor-banjir', [DashFlood::class, 'postHandler']);
  Route::post('/lapor-banjir', [DashFlood::class, 'postHandler']);
  Route::post('/profil', [DashUser::class, 'postHandler']);
  Route::post('/tindak-lanjut', [DashFollowUp::class, 'postHandler']);
});

// API
Route::group(['prefix'=> 'api'], function(){
  Route::get('activity/{activity:id}', [APIController::class, 'activity']);
  Route::get('flood/{flood:id}', [APIController::class, 'flood']);
  Route::get('floods', [APIController::class, 'floods']);
  Route::get('follow-up/{data:id}', [APIController::class, 'followUp']);
  Route::get('post/{post:id}', [APIController::class, 'post']);
});
