<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['throttle:api','cors']],function () {
    Route::get('users', [UserController::class, 'getUsers']);
    Route::post('user/create', [UserController::class, 'createUser']);
    Route::put('user/edit/{id}', [UserController::class, 'editUser']);
    Route::delete('user/delete', [UserController::class, 'deleteUser']);
});
