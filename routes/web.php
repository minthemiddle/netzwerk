<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('contact', 'ContactController');
Route::resource('note', 'NoteController');
