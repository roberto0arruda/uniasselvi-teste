<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', 'ClienteController');
Route::resource('produtos', 'ProdutoController');