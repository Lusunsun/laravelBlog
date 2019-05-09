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

Route::get('/',['uses'=>'IndexController@index','as'=>'home']);
Route::get('articleList',['uses'=>'ArticleController@articleList']);
Route::get('article',['uses'=>'ArticleController@index','as'=>'article']);
Route::get('loginForm',['uses'=>'admin\LoginController@loginForm','as'=>'loginForm']);
Route::post('login',['uses'=>'admin\LoginController@login','as'=>'login']);
Route::post('commentAdd',['prefix' => 'admin','uses'=>'admin\CommentController@add','as'=>'commentAdd']);
//后台
Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'],  function() {
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

    //留言管理
    Route::get('commentLists',['uses'=>'admin\CommentController@lists','as'=>'commentLists']);
    Route::get('commentUpdate',['uses'=>'admin\CommentController@update','as'=>'commentUpdate']);
    Route::post('commentEdit',['uses'=>'admin\CommentController@edit','as'=>'commentEdit']);
    Route::post('commentDelete',['uses'=>'admin\CommentController@delete','as'=>'commentDelete']);
    Route::get('commentCreate',['uses'=>'admin\CommentController@create','as'=>'commentCreate']);


});


