<?php
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('contact', 'ContactController');
    Route::resource('note', 'NoteController');
});

Route::get('/home', 'HomeController@index')->name('home');
