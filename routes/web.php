<?php
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/index', '/', 301);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('clientes', 'ClienteController');
    Route::post('clientes_desbloq/{id}', ['uses' => 'ClienteController@restore', 'as' => 'clientes.restore']);
    Route::resource('produtos', 'ProdutoController');
    Route::resource('pedidos', 'PedidoController');
    Route::post('pedido_produto/{id}', ['uses' => 'PedidoController@updateWithProdutoAjax', 'as' => 'pedidos.ajax']);

    Route::get('get-cliente-ajax/{id}', 'ClienteController@getClienteAjax');
});