<?php

use App\Http\Controllers\API\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index')->name('api.articles.index');
    Route::get('/articles/{id}', 'show')->name('api.articles.show');
    Route::post('/articles', 'store')->name('api.articles.store');
    Route::put('/articles/{id}', 'update')->name('api.articles.update');
    Route::delete('/articles/{id}', 'destroy')->name('api.articles.delete');
});
