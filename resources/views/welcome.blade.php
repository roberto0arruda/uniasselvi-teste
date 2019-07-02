@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        {{config('app.name')}}
    </div>

    <div class="links">
        <a href="/clientes">Clientes</a>
        <a href="/produtos">Produtos</a>
        <a href="/pedidos">Pedidos</a>
    </div>
</div>
@endsection
