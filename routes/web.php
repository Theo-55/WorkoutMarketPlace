<?php


use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Routing for posts
Route::controller(PostController::class)->group( function(){
    Route::get('/feed', 'index')->name('feed');
    Route::get('/viewPost/{id}', 'view')->name('view.Post');
    Route::get('/create/post',  'create')->name('create.post');
    Route::post('/create/posting', 'store');
    Route::get('post/search', 'search');
});


require __DIR__.'/auth.php';
