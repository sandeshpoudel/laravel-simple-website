<?php

use App\Article;
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
// Route::get('/posts/{post}', function($post){
// $posts =[
//     'first' =>'get this one',
//     'second'=>'haha not his',
// ];
// if (! array_key_exists($post, $posts)){
// abort(404, 'sorry that page was not found');
// } else {
// return view ('test',
// ['post'=> $posts[$post]]
// );
// }
// });

Route::get('/', function(){
    return view ('welcome');
});

Route::get ('/posts/{post}', 'PostsController@show');

Route::get('/contact', function(){
 return view('contact');
});

Route::get('/about', function(){
    return view('about', [
    'article' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::PUT('/articles/{article}', 'ArticlesController@update');
//REST
//      Articles/   ---list of articles
//      Articles/:id --- is for single article

//  GET/videos
//  POST/videos

//  GET/videos/2
//  GET/videos/2/edit
//  GET/videos/create

//  PUT/videos/2

//  DELETE/videos/2 
//

