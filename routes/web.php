<?php

use App\Http\Controllers\Study;
use App\Http\Controllers\FStudy;
use App\Http\Controllers\FeIncluded;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\CatprogController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\StructurController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SectionSettingController;




Route::get('/', function () {
    $catprogs = \App\Models\Catprog::all(); // kirim data ke layout
    return view('4th-fe.index', compact('catprogs'));
})->name('4th-fe.index');

Route::resource('catprog', CatprogController::class);

Route::post('/admin/section-settings/order', [SectionSettingController::class, 'updateOrder'])->name('section-settings.order');

Route::middleware(['auth'])->group(function () {
    Route::resource('testimonials', TestimonialController::class);
});

// routes/web.php
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/section-settings', [SectionSettingController::class, 'index'])->name('section-settings.index');
    Route::post('/admin/section-settings/toggle', [SectionSettingController::class, 'toggle'])->name('section-settings.toggle');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/section-settings', [SectionSettingController::class, 'index'])->name('section-settings.index');
    Route::post('/admin/section-settings/toggle', [SectionSettingController::class, 'toggle'])->name('section-settings.toggle');
});

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/section-settings', [SectionSettingController::class, 'index'])->name('section.settings');
    Route::post('/section-settings/update', [SectionSettingController::class, 'update'])->name('section.settings.update');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/logos', [LogoController::class, 'index']);
    Route::post('/logos', [LogoController::class, 'store']); // <- disesuaikan
    Route::get('/logos/edit/{logo}', [LogoController::class, 'edit']);
    Route::patch('logos/update/{logo}', [LogoController::class, 'update']);
    Route::delete('/logos/delete/{id}', [LogoController::class, 'delete']);
});


Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
// Route::post('/postLogin', [AuthController::class, 'postLogin'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route::get('/', [HomepageController::class, 'home'])->middleware('auth');
Route::get('/', [HomepageController::class, 'home']);

Route::get('/admin', [HomepageController::class, 'home_admin'])->middleware('auth');

// Logo
// Route::get('/logos', [LogoController::class, 'index']);

// User
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/delete/{id}', [UserController::class, 'delete']);
Route::get('/user/edit/{user}', [UserController::class, 'edit']);
Route::post('/user/update/{user}', [UserController::class, 'update']);

// Slider
Route::get('/slider', [HeaderController::class, 'index']);
Route::post('/slider/post', [HeaderController::class, 'store'])->middleware('auth');
Route::get('/slider/edit/{header}', [HeaderController::class, 'edit'])->middleware('auth');
Route::patch('slider/update/{id_slider}', [HeaderController::class, 'update_slider'])->middleware('auth');
Route::get('/slider/delete/{id}', [HeaderController::class, 'delete'])->middleware('auth');
Route::get('/slider/{id}', [HeaderController::class, 'show'])->name('detail.slider');
Route::get('/slider/{id}', [HeaderController::class, 'contact'])->name('detail.slider');
Route::get('/about/{about}', [AboutController::class, 'show'])->name('detile.about');
Route::patch('/slider/toggle-status/{id}', [HeaderController::class, 'toggleStatus'])->name('slider.toggleStatus');
Route::patch('/slider/toggleStatus/{id}', [HeaderController::class, 'toggleStatus'])->name('slider.toggleStatus');
Route::get('/slider/{id}', [HeaderController::class, 'showCarouselFe'])->name('slider.show');
Route::get('/slider/create', [HeaderController::class, 'createSummer']);
Route::post('slider/store', [HeaderController::class, 'storeSummer'])->name('slider.store');
Route::get('/insertSlider', [HeaderController::class, 'createSummer']);

// Unit
Route::get('/unit', [UnitController::class, 'index'])->middleware('auth');
Route::post('/unit/store', [UnitController::class, 'store'])->middleware('auth');
Route::get('unit/delete/{id}', [UnitController::class, 'destroy'])->middleware('auth');
Route::get('/unit/{unit}', [UnitController::class, 'show'])->name('unit.show');


// Kajian
Route::get('/study', [Study::class, 'index'])->middleware('auth')->middleware('auth');
Route::post('/study/store', [Study::class, 'store'])->middleware('auth');
Route::get('/study/delete/{id}', [Study::class, 'destroy'])->middleware('auth');
Route::get('/fe_study', [Study::class, 'detilStudy']);

// News
Route::get('/news', [NewsController::class, 'index'])->middleware('auth');
Route::post('/news/store', [NewsController::class, 'store'])->middleware('auth');
Route::get('/news/delete/{id}', [NewsController::class, 'destroy'])->middleware('auth');
Route::get('/news/frontend', [NewsController::class, 'frontend']);
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Structures
Route::post('/structure/store', [StructurController::class, 'store'])->middleware('auth');
Route::get('/structure', [StructurController::class, 'index'])->middleware('auth');
Route::get('/structure/delete/{id}', [StructurController::class, 'destroy'])->middleware('auth');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');


// About
Route::resource('about', AboutController::class);
Route::get('/test-create', function () {
    return view('about.create');
});
Route::get('/about', [AboutController::class, 'index'])->middleware('auth');
Route::post('/about/store', [AboutController::class, 'store'])->middleware('auth');
Route::patch('/about/{id}/toggle-status', [AboutController::class, 'toggleStatus'])->name('about.toggleStatus');
Route::get('/detilAbout', [HomepageController::class, 'aboutDetil']);

// Program
Route::resource('programs', \App\Http\Controllers\ProgramController::class);

// Route::get('/login', [AuthController::class, 'login']);

// Frontend star
// New Header start
Route::get('/fe-master', [FeIncluded::class, 'index']);
// New Header end
// kajian
Route::get('/fstudy', [FStudy::class, 'index']);
// Frontend end

// Detil
Route::get('/detilStudy', [HomepageController::class, 'detilStudy']);
