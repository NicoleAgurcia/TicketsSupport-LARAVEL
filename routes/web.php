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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');

/*BORRAR, CONTROLLER*/
Route::get('/test', 'HomeController@test');

Route::get('/', 'TicketsController@AllTickets');

Route::get('new_ticket', 'TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');

Route::get('tickets/{ticket_id}', 'TicketsController@show');

Route::get('my_tickets', 'TicketsController@userTickets');



Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

	Route::get('create', 'AdminController@create_user');
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});

Route::post('comment', 'CommentsController@postComment');


