<?php

use App\Http\Controllers\Admin\DashboardController;
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

// Route::get('login', [User::class, 'GetLogin']);
Route::get('check-login', [User::class, 'CheckLogin']);
Route::get('trademark', [User::class, 'GetTrademark']);
Route::get('categories', [User::class, 'GetCategories']);
Route::post('/add-account', [User::class, 'AddAccount']);
Route::get('/banner', [User::class, 'GetBanner']);
Route::delete('/remove-account', [User::class, 'RemoveAccount']);
Route::post('/update-account', [User::class, 'UpdateAccount']);
Route::post('/add-products', [User::class, 'AddProducts']);
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login', [User::class, 'GetLogin']);
});
// Route::get("/", function () {
//     return view("Welcome");
// })->middleware('token.is.valid');

Route::get("/addacount", [User::class, 'create']);



