<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Url;
use App\Http\Controllers\Api\UrlsController;
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


Route::apiResource('urls', 'App\Http\Controllers\Api\UrlsController')->only(['index', 'show', 'store']);

Route::get('urls/slug/{slug}', function (Request $request, $slug) {
    return Url::where('slug', '=', $slug)->firstOrFail();
});

Route::post('urls/check', ['as' => 'urls.check', 'uses' => 'App\Http\Controllers\Api\UrlsController@check']);
