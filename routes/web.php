<?php

Route::group(['middleware'=>['web'], 'namespace' => 'LucasQuinnGuru\SitetronicPage\Controllers'], function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::resource('pages', 'Admin\\PageController');
    });

    Route::resource( 'pages', 'PageController@index' );
    //Route::get('{page}/{subs}', [
    //    'uses' => 'PageController@subPage',
    //])->where(['page' => '^((?!login).)*$', 'subs' => '.*']);
});
