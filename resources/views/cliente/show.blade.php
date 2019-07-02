@extends('adminlte::page')

@section('title', 'cliente detalhe')

@section('content_header')
<a href="{{route('clientes.create')}}">
    <button type="button" class="btn btn-success btn-sm" title="cadastro cliente">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Cliente</a></li>
    <li><a href="">Detalhe</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">Detalhes do Cliente</div>
    <div class="panel-body media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="https://via.placeholder.com/150" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">Nome: <b>{{ $cliente->nome }}</b></h4>
            <h4>E-mail: <b>{{ $cliente->email }}</b></h4>
            <h4>CPF: <b>{{ $cliente->cpf }}</b></h4>
        </div>
    </div>

    <div class="panel-heading" style="text-align: center">Lista de Pedidos</div>
    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped">
            <thead>
                <th></th>
                <th>ID</th>
                <th>status</th>
                <th>valor</th>
                <th>Data</th>
            </thead>
            <tbody>
                @forelse ($cliente->pedidos as $pedido)
                <tr>
                    <td>
                        <a href="{{route('pedidos.edit', $pedido->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form action="{{route('pedidos.destroy', $pedido->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->status}}</td>
                    <td>R$ {{ number_format($pedido->vlr_bruto, 2, '.', '.') }}</td>
                    <td>{{$pedido->created_at}}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop