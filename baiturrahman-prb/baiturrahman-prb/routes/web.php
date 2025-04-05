<?php

use App\Http\Controllers\FeIncluded;
use App\Http\Controllers\FStudy;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StructurController;
use App\Http\Controllers\Study;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomepageController::class, 'home']);
Route::get('/admin', [HomepageController::class, 'home_admin']);
Route::get('/slider', [HeaderController::class, 'index']);
Route::post('/slider/post', [HeaderController::class, 'store']);
Route::patch('slider/update/{id}', [HeaderController::class, 'update_slider']);
Route::get('/slider/delete/{id}', [HeaderController::class, 'delete']);

// Unit
Route::get('/unit', [UnitController::class, 'index']);
Route::post('/unit/store', [UnitController::class, 'store']);
Route::get('unit/delete/{id}', [UnitController::class, 'destroy']);

// Kajian
Route::get('/study', [Study::class, 'index']);
Route::post('/study/store', [Study::class, 'store']);
Route::get('/study/delete/{id}', [Study::class, 'destroy']);

// News
Route::get('/news', [NewsController::class, 'index']);
Route::post('/news/store', [NewsController::class, 'store']);
Route::get('/news/delete/{id}', [NewsController::class, 'destroy']);

// Structures
Route::post('/structure/store', [StructurController::class, 'store']);
Route::get('/structure', [StructurController::class, 'index']);
Route::get('/structure/delete/{id}', [StructurController::class, 'destroy']);

// Frontend star
// New Header start
Route::get('/fe-master', [FeIncluded::class, 'index']);
// New Header end
// kajian
Route::get('/fstudy', [FStudy::class, 'index']);
// Frontend end
