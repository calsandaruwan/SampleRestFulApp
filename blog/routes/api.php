<?php

use Illuminate\Http\Request;

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

/*
 * Article related API routes
 */
Route::post('/article/create', 'Api\ApiArticleController@createArticle');
Route::get('/articles', 'Api\ApiArticleController@getArticle');
Route::get('/article/{id}', 'Api\ApiArticleController@getArticle');
Route::post('/article/edit/{id}', 'Api\ApiArticleController@editArticle');
Route::post('/article/delete/{id}', 'Api\ApiArticleController@deleteArticle');

/*
 * Author related API routes
 */
Route::post('/author/create', 'Api\ApiAuthorController@createAuthor');
Route::get('/author/{id}', 'Api\ApiAuthorController@getAuthor');