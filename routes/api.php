<?php

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

Route::middleware(['auth:api', 'scope:view-user'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/tickets', TicketsController::class)
    ->middleware(['auth:api', 'scope:view-tickets']);
Route::resource('/ticketsReplies', TicketsRepliesController::class)
    ->middleware(['auth:api', 'scope:view-ticketsReplies']);