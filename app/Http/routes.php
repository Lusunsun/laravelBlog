<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['uses'=>'IndexController@index']);
Route::get('articleList',['uses'=>'ArticleController@articleList']);
Route::get('article/{id}',['uses'=>'ArticleController@index','as'=>'article']);

//后台
Route::group(['prefix' => 'admin'],  function() {
    Route::get('index',['uses'=>'admin\ArticleController@index','as'=>'adminIndex']);

    //文章管理
    Route::get('articleLists',['uses'=>'admin\ArticleController@lists','as'=>'articleLists']);
    Route::get('articleUpdate',['uses'=>'admin\ArticleController@update','as'=>'articleUpdate']);
    Route::post('articleEdit',['uses'=>'admin\ArticleController@edit','as'=>'articleEdit']);
    Route::post('articleDelete',['uses'=>'admin\ArticleController@delete','as'=>'articleDelete']);
    Route::get('articleCreate',['uses'=>'admin\ArticleController@create','as'=>'articleCreate']);
    Route::post('articleAdd',['uses'=>'admin\ArticleController@add','as'=>'articleAdd']);

    //分类管理
    Route::get('categoryLists',['uses'=>'admin\CategoryController@lists','as'=>'categoryLists']);
    Route::get('categoryUpdate',['uses'=>'admin\CategoryController@update','as'=>'categoryUpdate']);
    Route::post('categoryEdit',['uses'=>'admin\CategoryController@edit','as'=>'categoryEdit']);
    Route::post('categoryDelete',['uses'=>'admin\CategoryController@delete','as'=>'categoryDelete']);
    Route::get('categoryCreate',['uses'=>'admin\CategoryController@create','as'=>'categoryCreate']);
    Route::post('categoryAdd',['uses'=>'admin\CategoryController@add','as'=>'categoryAdd']);
});


