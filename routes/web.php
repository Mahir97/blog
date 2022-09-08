<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'getWelcome']);

Route::get('/page/{postid}', [PagesController::class, 'getPage']);

Route::get('/category/{categoryid}', [PagesController::class, 'getCategory']);

Route::get('/Post', [PagesController::class, 'createPost'])->middleware('isNotLoggedIn');;

Route::post('/Post', [PagesController::class, 'storePost'])->name('senddata')->middleware('isNotLoggedIn');;

Route::get('/Register', [PagesController::class, 'registrationPage'])->middleware('isLoggedIn');

Route::post('/Register', [PagesController::class, 'storeUser'])->middleware('isLoggedIn');

Route::get('/Contact', [PagesController::class, 'contactPage']);

Route::post('/Contact', [PagesController::class, 'storeContact'])->name('cm');

Route::get('/Login', [PagesController::class, 'loginPage'])->middleware('isLoggedIn');

Route::post('/Login', [PagesController::class, 'loginUser'])->middleware('isLoggedIn');

Route::post('/comment', [PagesController::class, 'storeComment']);

Route::get('/logout', [PagesController::class, 'logout']);
