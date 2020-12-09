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




// web guard

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('products')->get('/{pages}', 'PageController')
	  ->name('page')
	  ->where('pages','contact|sales-contact|enquiry-contact');

Route::get('{pages}', 'PageController')
	  ->name('page')
	  ->where('pages','about|terms');


Route::group(['middleware' => ['auth']], function() {

	

	Route::resource('roles','RoleController'); //spatie package
	Route::resource('users','UserController'); //auth package 

	Route::get('changepassword', function() {

		
			$user = App\User::where('email','bberge@example.com')->first();
			$user->password = Hash::make('bberge@example.com');
			$user->save();
			echo 'Password changed successfully.';
	
	});

	//Post, Comment controller
	Route::resource('posts','PostController');
	
	/*
	Route::get('posts/{post_id}/comments','PostController@listcommentsbypost')
			->name('postcomments.list');
	*/

	Route::get('posts/{post_id}/comments','PostController@commentsfrmbypost')
				->name('postcomments.add');

	Route::post('posts/{post_id}/comments/{comment_id}','PostController@addcommentsbypost');
	Route::delete('posts/{post_id}/comments/{comment_id}','PostController@deletecommentsbypost');
	Route::patch('posts/{post_id}/comments/{comment_id}','PostController@updatecommentsbypost');


	Route::resource('roles','SearchController'); //spatie package

	
});

Route::prefix('user/search')->get('/{arg1?}', 'SearchController@userfulltextfrm')
	  ->name('search.userfulltextfrm');


Route::prefix('search')->get('/{arg1?}', 'SearchController@fulltextfrm')
	  ->name('search.fulltextfrm');

Route::get('add_postimage', function (){
	factory(\App\postfiles::class,2)->create();
});
Route::get('add_user_image', function (){
	factory(\App\usersfiles::class,2)->create();
});

/*
Route::prefix('products')->get('/{pages}', 'PageController')
	  ->name('page')
	  ->where('pages','contact|sales-contact|enquiry-contact');

Route::get('{pages}', 'PageController')
	  ->name('page')
	  ->where('pages','about|terms');

Route::get('/enquiry_get/{arg1?}/{arg2?}','EnquiryController@get')
		->where('arg2','[0-9]+')->where('arg1','[A-Za-z]+')
		->name('enquiry.get');

Route::post('/enquiry_get/{arg1?}/{arg2?}','EnquiryController@ContactUsForm')
	->where('arg2','[0-9]+')->where('arg1','[A-Za-z]+')
	->name('enquiry.store');

*/		

//traits

//Route::get('students', StudentController::class);