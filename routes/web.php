<?php

use App\Models\Post;
use Illuminate\Support\Facades\{Route, Auth};
use Illuminate\Http\Controllers\PostController;



Route::get('search', 'SearchController@post')->name('search.post');
Route::get('post', 'PostController@index')->name('post.index');
Route::middleware('auth')->group(function () {
    Route::get('post/create', 'PostController@create')->name('post.create');
    Route::post('post', 'PostController@store');
    Route::get('post/{id}/edit', 'PostController@edit');
    Route::put('post/{id}', 'PostController@update');
    Route::delete('post/{id}', 'PostController@destroy');

    Route::get('/polsek', 'PolsekController@indexpolsek');
    Route::get('/kepolisian', 'PolsekController@index');
    Route::get('/kepolisian/create', 'PolsekController@create')->name('kepolisian.create');
    Route::post('/kepolisian', 'PolsekController@store');
    Route::get('/kepolisian/{id}/edit', 'PolsekController@edit');
    Route::put('/kepolisian/{id}/', 'PolsekController@update');
    Route::delete('/kepolisian/{id}/', 'PolsekController@destroy');

    Route::get('/tentara', 'TentaraController@index');
    Route::get('/tni', 'TentaraController@indextentara')->name('tni.index');
    Route::get('/tni/create', 'TentaraController@create')->name('tni.create');
    Route::post('/tni', 'TentaraController@store');
    Route::get('/tni/{id}/edit', 'TentaraController@edit');
    Route::put('/tni/{id}/', 'TentaraController@update');
    Route::delete('/tni/{id}/', 'TentaraController@destroy');

    Route::get('/timsar', 'SarController@index');
    Route::get('/sar', 'SarController@indextimsar')->name('sar.index');
    Route::get('/sar/create', 'SarController@create')->name('sar.create');
    Route::post('/sar', 'SarController@store');
    Route::get('/sar/{id}/edit', 'SarController@edit');
    Route::put('/sar/{id}/', 'SarController@update');
    Route::delete('/sar/{id}/', 'SarController@destroy');
});



Auth::routes();

Route::resource('telegram', 'TelegramController');
Route::get('/approve/post', 'PostController@indexApprove')->name('post.indexApprove');
Route::get('/approvewaiting/post', 'PostController@indexWaiting')->name('post.indexWaiting');
Route::view('/dashboard', 'dashboard.homedashboard')->name('dashboard');

Route::get('/', 'PostController@location')->name('post.indexlocation');

Route::get('post/{slug}', 'PostController@show')->name('post.show');
Route::get('categories/{category:slug}', 'CategoryController@show')->name('categories.show');
Route::get('tags/{tag:slug}', 'TagController@show')->name('tags.show');
