@extends('adminlte::page')

@section('title', 'pedido produtos')

@section('content_header')
<a href="{{route('pedidos.index')}}">
    <button type="button" class="btn btn-warning btn-sm">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Pedido</a></li>
    <li><a href="">Produtos</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">pedido numero: # {{$pedido->id}}</div>
    <div class="row">
        <div class="col-lg-3">
            <div class="panel-body media">
                <div class="media-body">
                    <h4 class="media-heading">Status do pedido</h4>
                    <ul class="list-group">
                        @switch($pedido->status)
                            @case('A')
                                <li class="list-group-item list-group-item-info">aberto</li>
                                @break
                            @case('P')
                                <li class="list-group-item list-group-item-success">pago</li>
                                @break
                            @default
                            <li class="list-group-item list-group-item-danger">cancelado</li>
                        @endswitch
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel-body media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="https://via.placeholder.com/150" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h5 class="media-heading">Detalhes do cliente</h5>
                    <h5>Nome: <b>{{ $pedido->cliente->nome }}</b></h5>
                    <h5>E-mail: <b>{{ $pedido->cliente->email }}</b></h5>
                    <h5>CPF: <b>{{ setMaskCpf($pedido->cliente->cpf, '###.###.###-##' ) }}</b></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel-body media">
                <div class="media-body">
                    <h4 class="media-heading">Detalhes do pedido</h4>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info">
                            <div class="row">
                                <div class="col-md-6">total: </div>
                                <div class="col-md-6">R$ {{number_format($pedido->vlr_bruto, 2)}}</div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-warning">
                            <div class="row">
                                <div class="col-md-6">desconto: </div>
                                <div class="col-md-6">R$ {{number_format($pedido->desconto, 2)}}</div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-success">
                            <div class="row">
                                <div class="col-md-6">valor: </div>
                                <div class="col-md-6">R$ {{number_format($pedido->vlr_liquido, 2)}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-heading" style="text-align: center">Lista de Produtos</div>
    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped">
            <thead>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>valor</th>
                <th>Data</th>
            </thead>
            <tbody>
                @forelse ($pedido->produtos as $produto)
                <tr>
                    <td class=""><div class="text-center"><div class="btn-group">
                        <form action="{{route('pedidos.destroy', $pedido->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></div></div>
                    </td>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->valor}}</td>
                    <td>{{$produto->created_at}}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop