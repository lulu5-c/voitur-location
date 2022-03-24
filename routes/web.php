<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\MessageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now c








reate something great!
|
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\PageController::class, 'index']);

Route::get('/louer', [App\Http\Controllers\PageController::class, 'louer']);
Route::post('/valider', [App\Http\Controllers\PageController::class, 'valider']);
Route::post('/voiture', [App\Http\Controllers\PageController::class, 'voiture']);
Route::get('/restituer', [App\Http\Controllers\PageController::class, 'restituer']);
Route::get('/restitue', [App\Http\Controllers\PageController::class, 'restitution']);


/**Rechercher element */
Route::post('/search', [App\Http\Controllers\PageController::class, 'search']);
Route::post('/cate', [App\Http\Controllers\PageController::class, 'cate']);
Route::post('/modal', [App\Http\Controllers\PageController::class, 'modal']);
Route::get('/modal', [App\Http\Controllers\PageController::class, 'modal']);
Route::get('/pdf-download', [App\Http\Controllers\PageController::class, 'pdf']);


Route::get('/adminlogin', [AdminController::class, 'index']);
Route::post('/adminlogin', [AdminController::class, 'login']);

Auth::routes();

/* Administrateur */
Route::get('/admin', [AdminPostController::class, 'index']);
Route::get('/confirm-restitue', [AdminController::class, 'restitution']);
Route::get('/create', [AdminPostController::class, 'create']);
Route::post('/store', [AdminPostController::class,'store']);
Route::post('/edit', [AdminPostController::class, 'edit']);
Route::post('/update', [AdminPostController::class, 'update']);
Route::post('/show', [AdminPostController::class, 'show']);
Route::post('/delete', [AdminPostController::class, 'destroy']);
Route::get('/pdf', [AdminPostController::class, 'pdf']);

/**Email  */
Route::get('/contact', [App\Http\Controllers\MessageController::class, 'contact']);
Route::post('/contact', [App\Http\Controllers\MessageController::class, 'sendMessageGoogle']);
