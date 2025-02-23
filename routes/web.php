<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Dashboard\DashActivity;
use App\Http\Controllers\Dashboard\DashAssistance;
use App\Http\Controllers\Dashboard\DashHome;
use App\Http\Controllers\Dashboard\DashFlood;
use App\Http\Controllers\Dashboard\DashFollowUp;
use App\Http\Controllers\Dashboard\DashImpact;
use App\Http\Controllers\Dashboard\DashPost;
use App\Http\Controllers\Dashboard\DashRisk;
use App\Http\Controllers\Dashboard\DashUser;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/artikel', [PostController::class, 'blog']);
Route::get('/artikel/{post:slug}', [PostController::class, 'post']);
Route::get('/beranda', [HomeController::class, 'index']);
Route::get('/daerah-rawan/{risk:id}', [ReportController::class, 'risk']);
Route::get('/kegiatan', [ActivityController::class, 'index']);
Route::post('/kegiatan', [ActivityController::class, 'filter']);
Route::get('/kegiatan/{activity:id}', [ActivityController::class, 'activity']);
Route::get('/kolaborator', [CollaboratorController::class, 'index']);
Route::get('/kolaborator/{user:username}', [CollaboratorController::class, 'user']);
Route::get('/laporan/{flood:id}', [ReportController::class, 'flood']);
Route::get('/laporan-banjir', [ReportController::class, 'index']);
Route::get('/peta-banjir', [HomeController::class, 'map']);
Route::get('/peta-daerah-rawan', [HomeController::class, 'map2']);
Route::get('/peta-dampak-banjir', [HomeController::class, 'map3']);

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
  Route::get('/bantuan', [DashAssistance::class, 'index']);
  Route::get('/dashboard', [DashHome::class, 'index']);
  Route::get('/kegiatan', [DashActivity::class, 'index']);
  Route::get('/lapor-banjir', [DashFlood::class, 'index']);
  Route::get('/lapor-dampak', [DashImpact::class, 'index']);
  Route::get('/lapor-rawan', [DashRisk::class, 'index']);
  Route::get('/profil', [DashUser::class, 'index']);
  Route::get('/tindak-lanjut', [DashFollowUp::class, 'index']);
  
  Route::post('/artikel', [DashPost::class, 'postHandler']);
  Route::post('/bantuan', [DashAssistance::class, 'postHandler']);
  Route::post('/kegiatan', [DashActivity::class, 'postHandler']);
  Route::post('/lapor-banjir', [DashFlood::class, 'postHandler']);
  Route::post('/lapor-dampak', [DashImpact::class, 'postHandler']);
  Route::post('/lapor-rawan', [DashRisk::class, 'postHandler']);
  Route::post('/profil', [DashUser::class, 'postHandler']);
  Route::post('/tindak-lanjut', [DashFollowUp::class, 'postHandler']);
});

// API
Route::group(['prefix'=> 'api'], function(){
  Route::get('activity/{activity:id}', [APIController::class, 'activity']);
  // Route::get('assistance/{assistance:id}', [APIController::class, 'assistance']);
  Route::get('assistance/{data:id}', [APIController::class, 'assistance']);
  Route::get('city/{city:id}', [APIController::class, 'city']);
  Route::get('flood/{id}', [APIController::class, 'flood']);
  Route::get('floods', [APIController::class, 'floods']);
  Route::get('follow-up/{data:id}', [APIController::class, 'followUp']);
  Route::get('impact/{data:id}', [APIController::class, 'impact']);
  Route::get('impacts', [APIController::class, 'impacts']);
  Route::get('post/{post:id}', [APIController::class, 'post']);
  Route::get('risk/{id}', [APIController::class, 'risk']);
  Route::get('risks', [APIController::class, 'risks']);
});
