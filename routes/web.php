<?php

Route::group(['middleware'=>['web'], 'namespace' => 'LucasQuinnGuru\SitetronicPage\Controllers'], function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::resource('pages', 'Admin\\PageController');
    });

    Route::get('/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));
});
