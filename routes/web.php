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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('frontend.index');
// });

//first 
 Auth::routes();

Auth::routes(['verify' => true]);


Route::get('/',       'FrontendController@home')->name('home');
Route::get('about',   'FrontendController@about')->name('about');
Route::get('contact', 'FrontendController@contact')->name('contact');

Route::get('/filter/{id?}',  'FrontendController@filter')->name('filter');
Route::get('/search',  'FrontendController@search')->name('search');


 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/crud', 'CrudController@index');
Route::get('/create', 'CrudController@create');
Route::post('/store', 'CrudController@store');
Route::post('/edit', 'CrudController@edit');
//Show Detsils
Route::get('/show/{id}', function($id){
	return view('showrecord',[
		'editdata'=>App\crud::where('id',$id)->get()
	]); 
});

Route::get('/edit/{id}', function($id){
	return view('editrecord',[
		'editdata'=>App\crud::where('id',$id)->get()
	]); 
});

Route::get('/delete/{id}', 'CrudController@destroy');
Route::get('/show/{id}', 'CrudController@show');
Route::get('/editrec/{id}', 'CrudController@edit');
Route::post('/ajaxupdate/', 'CrudController@update');

Route::resource('/blogpost','BlogpostController');
Route::resource('/profile', 'ProfileController');


Route::group(['as' => 'admin.','middleware' => ['auth','admin']], function(){
      Route::get('/admin', 'AdminController@index')->name('index');
      Route::get('admin/userlist', 'AdminController@userlist')->name('userlist');
      Route::get('admin/postlist', 'AdminController@postlist')->name('postlist');
});

Route::group(['as'=>'user.','middleware'=>['auth'],'prefix'=>'user'],function(){
   Route::get('getstate/{id?}', 'ProfileController@getStateBycountry')->name('state');
});


