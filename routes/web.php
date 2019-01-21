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

Route::get('/', function () {
    return view('welcome');
})->name('homePage');

Route::get('/article/{id?}','TestController@article')
    ->where('id', '[0-9]+')
    ->name('articleRoute');

Route::get('/sign-in','TestController@showLoginForm')->name('loginRoute');

Route::post('/sign-in','TestController@postingLoginData')->name('loginRoutePost');

Route::get('/sign-up','TestController@showSignUpForm')->name('signUpRoute');

Route::post('/sign-up','TestController@showSignUpData')->name('signUpRoutePost');

Route::get('/article-add','TestController@showArticleAddForm')->name('ArticleAddRoute');

Route::post('/article-add','TestController@showArticleAddData')->name('ArticleAddRoutePost');
//Route::view('/article-add','article-add');

Route::get('/about-me/user','TestController@data');

Route::view('/about-me', 'about');

Route::put('/testput', function () {
    return 'PUT!!!';
});