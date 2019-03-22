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

Route::group(['middleware' => ['auth']], function () {
//    Route::get('/', function () {
//        return view('welcome');
//    });
    Route::get('/','ClientController@anyData');
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/data', 'ClientController@anyData')->name('clients.data');
        Route::get('/show/{id}', 'ClientController@show')->name('clients.show');
        Route::post('/update', 'ClientController@update')->name('clients.update');
        Route::get('/addForm', 'ClientController@addForm')->name('clients.addForm');
        Route::get('/destroy/{id}', 'ClientController@destroy')->name('clients.destroy');
        Route::get('/addForm', 'ClientController@addForm')->name('clients.addForm');
        Route::get('/addFormWithClient/{id}', 'ClientController@addFormWithClient')->name('clients.addFormWithClient');
        Route::post('/create', 'ClientController@create')->name('clients.create');
        Route::get('/visits/{id}','ClientController@visits')->name('clients.visits');
        Route::get('/print/{id}','ClientController@print')->name('clients.print');

        Route::post('/addVisit', 'ClientController@addVisit')->name('clients.addVisit');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/data', 'UserController@anyData')->name('users.data');
        Route::get('/show/{id}', 'UserController@show')->name('users.show');
        Route::post('/update', 'UserController@update')->name('users.update');
        Route::get('/addForm', 'UserController@addForm')->name('users.addForm');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('users.destroy');
        Route::get('/addForm', 'UserController@addForm')->name('users.addForm');
        Route::post('/create', 'UserController@create')->name('users.create');

    });
//    Route::group(['prefix' => 'tickets'], function () {
//        Route::get('/data', 'TicketController@anyData')->name('tickets.data');
//        Route::get('/show/{id}', 'TicketController@show')->name('tickets.show');
//        Route::post('/update', 'TicketController@update')->name('tickets.update');
//        Route::get('/addForm', 'TicketController@addForm')->name('tickets.addForm');
//        Route::get('/destroy/{id}', 'TicketController@destroy')->name('tickets.destroy');
//        Route::get('/addForm', 'TicketController@addForm')->name('tickets.addForm');
//        Route::post('/create', 'TicketController@create')->name('tickets.create');
//
//    });
    Route::group(['prefix' => 'leeds'], function () {
        Route::get('/new','LeedsController@show')->name('leeds.show');
    });
    Route::group(['prefix' => 'journaltics'], function () {
        Route::get('/data', 'JournalTicketController@anyData')->name('journaltics.data');
        Route::get('/show/{id}', 'JournalTicketController@show')->name('journaltics.show');
        Route::post('/update', 'JournalTicketController@update')->name('journaltics.update');
        Route::get('/addForm', 'JournalTicketController@addForm')->name('journaltics.addForm');
        Route::get('/destroy/{id}', 'JournalTicketController@destroy')->name('journaltics.destroy');
        Route::get('/addForm', 'JournalTicketController@addForm')->name('journaltics.addForm');
        Route::post('/create', 'JournalTicketController@create')->name('journaltics.create');

    });
    Route::group(['prefix' => 'contracts'], function () {
        Route::get('/data', 'ContractController@anyData')->name('contracts.data');
        Route::get('/show/{id}','ContractController@show')->name('contracts.show');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
