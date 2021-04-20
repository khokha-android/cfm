<?php

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'tickets'], function (){
    Route::get('create', 'TicketController@createTicket')->name('tickets.create');
    Route::post('store', 'TicketController@storeTicket')->name('tickets.store');
    Route::get('list', 'TicketController@getTickets')->name('tickets.list');
    Route::get('edit/{ticket_id}', 'TicketController@editTicket')->name('tickets.edit');
    Route::post('editStore/{ticket_id}', 'TicketController@editStore')->name('tickets.editStore');
    Route::get('delete/{ticket_id}', 'TicketController@deleteTicket')->name('tickets.delete');
    Route::get('assigned/{ticket_id}', 'TicketController@assignedTicket')->name('tickets.assigned');
    Route::post('assignedStore', 'TicketController@storeAssigned')->name('tickets.assignedStore');
});
