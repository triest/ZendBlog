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
});

Route::get('blade', function () {
    return view('child');
});

Route::get('/', 'IndexController@userslist');
  //article/1
Route::get('article/{id}','IndexController@show')->name('articleShow');

Route::get('user/{id}','IndexController@UserShow')->name('userShow');

Route::get('page/add','IndexController@add');

Route::post('page/add','IndexController@store')->name('articleStore');

Route::post('page/add','IndexController@add')->name('articleStore');

Route::get('page/reg','IndexController@reg');

Route::post('page/reg','IndexController@reg2')->name('registrationUser');
/*
Route::post('page/demo','IndexController@reg2')->name('registrationUser');
/*путь методы редактирования пользовател*/



Route::post('page/userslist','IndexController@UserChange2')->name('userchange2');

Route::get('page/userslist', 'IndexController@userslist')->name('usersList');

Route::get('page/userchange/{id}', 'IndexController@UserChange')->name('userchange');
/*
Route::get('page/add', 'IndexController@reg');
*/

Route::get('form-validation', 'IndexController@formValidation');

Route::post('form-validation', 'IndexController@formValidationPost');

Route::get('page/demo', 'IndexController@formValidationPost2');