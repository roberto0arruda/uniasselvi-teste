@extends('adminlte::page')

@section('title', 'pedidos')

@section('content_header')
<!-- Button trigger modal novoPedido -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#novoPedido" title="novo pedido">
    <i class="fa fa-plus" aria-hidden="true"></i>
</button>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Pedidos</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">Lista de Pedidos</div>

    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped" id="table">
            <thead>
                <th></th>
                <th>ID</th>
                <th>status</th>
                <th>clinte</th>
                <th>valor</th>
                <th>Data</th>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td class=""><div class="text-center"><div class="btn-group">
                        <a href="{{route('pedidos.edit', $pedido->id)}}" class="tip btn btn-info btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form action="{{route('pedidos.destroy', $pedido->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></div></div>
                    </td>
                    <td>{{$pedido->id}}</td>
                    <td>
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
                    </td>
                    <td>
                        <a href="{{route('clientes.show', $pedido->cliente_id)}}" class="btn btn-link" title="Detalhes do Cliente: {{$pedido->cliente->nome}}">
                            <i class="fa fa-eye" aria-hidden="true"></i> {{$pedido->cliente->nome}}
                        </a>
                    </td>
                    <td>R$ {{ number_format($pedido->vlr_bruto, 2)}}</td>
                    <td>{{$pedido->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal novoPedido -->
<div class="modal fade" id="novoPedido" tabindex="-1" role="dialog" aria-labelledby="novoPedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="novoPedidoLabel">Pedido do Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pedidos.store')}}" method="post">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cliente">cliente</label>
                        <select name="cliente" id="cliente" class="selectpicker" data-live-search="true">
                            <option value=""></option>
                            @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}} - {{$cliente->cpf}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ url('/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
@stop
@section('js')
    <script src="{{ url('/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ url('/vendor/bootstrap-select/dist/js/i18n/defaults-pt_BR.min.js') }}"></script>
@stop