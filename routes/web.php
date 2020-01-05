<?php
Auth::routes();

Route::get('', 'IndexController@index')->name('index');

Route::middleware('auth')->group(function () {
    Route::resource('contact', 'ContactController');
    Route::resource('note', 'NoteController');
});
