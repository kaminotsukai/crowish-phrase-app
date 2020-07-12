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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('phrases', 'PhraseController@list');
Route::get('phrases/{phrase}', 'PhraseController@show');
Route::post('phrases', 'PhraseController@store');
Route::delete('phrases/{phrase}', 'PhraseController@delete');
Route::put('phrases/{phrase}', 'PhraseController@update');

Route::get('authors', 'AuthorController@list');
Route::post('authors', 'AuthorController@store');