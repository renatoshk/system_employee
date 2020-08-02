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
    return view('auth.login');
});
Auth::routes(['register'=>false]);

Route::get('/', 'HomeController@index')->name('home');
//admin area
Route::group(['middleware'=>'admin'], function(){
   Route::get('/adm', 'AdminController@index'); 
   Route::resource('/adm/roles', 'AdminRoleController'); 
   Route::resource('/adm/attrs', 'AdminRoleAttrController'); 
   Route::resource('/adm/parentdeps', 'AdminParentDepController'); 
   Route::resource('/adm/deps', 'AdminDepController'); 
   Route::resource('/adm/employees', 'AdminEmployeeController');
   Route::get('ajax', function(){ 
          return view('ajax'); 
    });
  Route::post('/postajax','AjaxController@post'); 
});
Route::get('/profile/{id}', 'ProfileController@updateprofile')->name('profile');
Route::patch('/profile', 'ProfileController@update');
Route::get('/changepassword', 'ProfileController@change')->name('password');
Route::patch('/password', 'ProfileController@changepassword');
