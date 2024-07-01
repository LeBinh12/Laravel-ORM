<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
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

Route::get('login', [User::class, 'GetLogin']);
Route::get('check-login', [User::class, 'CheckLogin']);
Route::post('/add-account', [User::class, 'AddAccount']);
Route::get('/banner', [User::class, 'GetBanner']);
Route::delete('/remove-account', [User::class, 'RemoveAccount']);
Route::post('/update-account', [User::class, 'UpdateAccount']);
