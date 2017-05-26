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

Route::get('/', function () {
  if(Auth::user()){
    return redirect('/blog');
  }else{
    return view('welcome');
  }
});
Route::get('auth/login',function(){
  if(Auth::user()){
    return redirect('/blog');
  }else{
    return view('welcome');
  }
});



Route::group(['middleware' => 'auth'], function () {
  Route::get(
    '/blog/show',
    array('uses' => 'Blog@showme'
  ));
  Route::get(
    '/blog',
    array(
      'as'=>'blg',
      'uses' => 'Blog@showme'
  ));
});


Route::post(
  '/blog',
  array(
    'as'=>'blg',
    'uses' => 'Blog@create'
));

Route::get(
  '/faker',
  array('uses' => 'Hukka@create'
));

Route::get(
  '/blog/admin',
  array('uses' => 'Blog@admin'
))->middleware(['auth','admin']);


Route::get(
  '/profile/{user}',
  array('uses' => 'ProfileController@index'
));
Route::get('/artices/{id}',array('uses' => 'ArticleController@index'));

Route::get('/country/{id}',array('uses' => 'ArticleController@country'));
