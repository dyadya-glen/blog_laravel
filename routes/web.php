<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('homePage');

Route::get('/about-me', function () {
    return view('layouts.primary',[
        'page' => 'pages.about',
        'title' => 'Обо мне'
    ]);
});


Route::get('/search-results', 'SearchController@searchShow')
    ->name('showSearchPage');


Route::group(['prefix' => 'feedback'], function () {

    Route::get('', 'FeedbackController@showFeedbackForm')->name('showFeedbackPage');

    Route::post('', 'FeedbackController@postingFeedbackData')->name('postingFeedbackPage');

});


Route::group(['prefix' => 'auth'], function () {

    Route::get('signin', 'AuthController@showSignInForm')->name('showSignInPage');

    Route::post('signin', 'AuthController@postingSignInData')->name('postingSignInPage');



    Route::get('signup', 'AuthController@showSignUpForm')->name('showSignUpPage');

    Route::post('signup', 'AuthController@postingSignUpData')->name('postingSignUpPage');

});


Route::group(['prefix' => 'post'], function () {
    Route::get('/creation', 'PostController@showCreationOfPost');

    Route::post('/creation', 'PostController@creationOfPost');

    Route::get('/update/{id}', 'PostController@postEditing')
        ->where('id', '[0-9]+');

    Route::post('/update/{id}', 'PostController@showPostEditing')
        ->where('id', '[0-9]+');

    Route::post('/{id}', 'PostController@postDeletion')
        ->where('id', '[0-9]+');

    Route::get('/{slug}', 'PostController@postBySlug')
        ->where('slug', '[\:0-9A-Za-z\-]+');

    Route::get('/tag/{tag}', 'PostController@listByTag');

    Route::get('/category/{category}', 'PostController@listByCategory');
});


Route::get('/one', function () {
    return view('layouts.secondary',[
        'page' => 'pages.post',
        'title' => 'Пост'
    ]);
});

//Route::get('/page/{id?}','TestController@page');