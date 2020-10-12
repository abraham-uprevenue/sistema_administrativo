<?php

use Illuminate\Support\Facades\Route;

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
   return redirect('/nova');
});

Route::get('/about', function () {
    $articles = App\Article::take(3)->latest()->get();

    return view('about', [
        'articles' => $articles
    ]);
 });

 Route::get('/articles', 'ArticlesController@index');
 Route::post('/articles', 'ArticlesController@store');
 Route::get('/articles/create', 'ArticlesController@create');
 Route::get('/articles/{article}', 'ArticlesController@show');
 Route::get('/articles/{article}/edit', 'ArticlesController@edit');
 Route::put('/articles/{article}', 'ArticlesController@update');

 
 

//Route::get('/posts/{post}', function ($post) {
    // $posts = [
    //     'my-first-post' => 'Hello, this is my first blog post!',
    //     'my-second-post' => 'This is the second post'

    // ];

    // if (! array_key_exists($post, $posts)) {
    //     abort(404, 'Sorry, that post was not found');
    // }

    // return view('post', [
    //     'post' => $posts[$post] ?? 'Nothing here yet.'
    // ]
    // );

//});
