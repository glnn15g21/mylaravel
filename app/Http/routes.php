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
    return view('welcome');
});

// Route::auth();

// Route::get('/home', 'HomeController@index');

// Route::get('/access', function () {
//     return 'you have access';
// });

Route::group(['middleware'=>'web'], function(){
	Route::auth();

	Route::get('/home', 'HomeController@index');

	Route::get('/access', function () {
	    return 'you have access';
	});

});
use Illuminate\Http\Request;

Route::get('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:2',
    ]);

    if ($validator->fails()) {
    	return 'fails';
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Task...
});