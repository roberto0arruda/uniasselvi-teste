<?php
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/index', '/', 301);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('clientes', 'ClienteController');
    Route::resource('produtos', 'ProdutoController');
    Route::resource('pedidos', 'PedidoController');

    Route::get('get-cliente-ajax/{id}', 'ClienteController@getClienteAjax');
});