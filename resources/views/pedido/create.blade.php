@extends('adminlte::page')

@section('title', 'pedido cadastrar')

@section('content_header')
<a href="{{route('pedidos.index')}}">
    <button type="button" class="btn btn-warning btn-sm">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Pedido</a></li>
    <li><a href="">Cadastrar</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">cadastrar pedido</div>

    <div class="panel-body table-responsive">
        @include('includes.alerts')

        <form action="{{route('pedidos.store')}}" method="post">
            {!! csrf_field() !!}

            {{-- @include('produto.form', ['formMode' => 'create']) --}}
        </form>

    </div>
</div>
@stop