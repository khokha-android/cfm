<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
//Route::get('/ticket', 'TicketController@getTickets')->name('ticket');
//Route::get('/create', 'TicketController@createTicket')->name('create');
Route::group(['prefix' => 'tickets'], function (){
    Route::get('create', 'TicketController@createTicket')->name('tickets.create');
    Route::post('store', 'TicketController@storeTicket')->name('tickets.store');
    Route::get('list', 'TicketController@getTickets')->name('tickets.list');
});
