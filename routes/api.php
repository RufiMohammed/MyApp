<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use app\Http\Controllers\API\RegisterController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/brands/{brand}',[BrandController::class,'show']);

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', 'App\Http\Controllers\API\RegisterController@login');

Route::middleware('auth:api')->group( function (){
    Route::resource('tasks', 'App\Http\Controllers\API\TaskController');
});
Route::middleware('auth:api')->group( function (){
    Route::resource('task_lists', 'App\Http\Controllers\API\TaskListController');
});

