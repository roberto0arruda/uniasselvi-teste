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
                        {!!$pedido->type($pedido->status)!!}
                        <li class="list-group-item list-group-item-info">
                            <!-- Button trigger modal novoProduto -->
                            <button type="button" class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target="#novoProduto" title="Adcionar Produto">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>
                            <form action="{{route('pedidos.update', $pedido->id)}}" method="POST"
                                onsubmit="return confirm('Confirma o recebimento de R${{number_format($pedido->vlr_liquido, 2, '.','.')}} ?');"
                                style="display:inline">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <input type="hidden" name="receber" value="P">
                                <button type="submit" class="btn btn-success btn-xs" title="Receber Baixa">
                                    <i class="fa fa-money" aria-hidden="true"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel-body media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-thumbnail" src="https://via.placeholder.com/150" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h5 class="media-heading">Detalhes do cliente</h5>
                    <h5>Nome: <b>{{ $pedido->cliente->nome }}</b></h5>
                    <h5>E-mail: <b>{{ $pedido->cliente->email }}</b></h5>
                    <h5>CPF: <b>{{ $pedido->cliente->cpf }}</b></h5>
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
                                <div class="col-md-6">total:</div>
                                <div class="col-md-6">R$ {{number_format($pedido->vlr_bruto, 2)}}</div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-warning">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="tip btn btn-warning btn-xs"
                                        data-toggle="modal" data-target="#desconto" title="Adcionar Produto">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> desconto:
                                    </button>
                                </div>
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
                <th>Nome</th>
                <th>valor</th>
            </thead>
            <tbody>
                @forelse ($pedido->produtos as $produto)
                <tr>
                    <td class=""><div class="text-center"><div class="btn-group">
                        <form action="{{route('pedidos.update', $pedido->id)}}" method="POST"
                            onsubmit="return confirm('Remover?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <input type="hidden" name="produto_id" value="{{$produto->id}}">
                            <button type="submit" class="tip btn btn-danger btn-xs" title="Deletar">
                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></div></div>
                    </td>
                    <td>{{$produto->nome}}</td>
                    <td>R$ {{number_format($produto->valor, 2, '.', '.')}}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal novoProduto -->
<div class="modal fade" id="novoProduto" tabindex="-1" role="dialog" aria-labelledby="novoProdutoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="novoProdutoLabel">Adicionar Produto(s)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pedidos.update', $pedido->id)}}" method="post">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="produtos">Produtos</label>
                        <select name="produtos[]" id="produtos" class="form-control selectpicker" data-live-search="true"
                            multiple multiple data-actions-box="true" data-size="5" title="Selecione ao menos 1 produto"
                            data-selected-text-format="count > 3" required>
                            @foreach ($produtos as $produto)
                            <option value="{{$produto->id}}" title="{{$produto->nome. '| R$ '.$produto->valor}}"
                                data-subtext="R${{$produto->valor}}">{{$produto->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Desconto -->
<div class="modal fade" id="desconto" tabindex="-1" role="dialog" aria-labelledby="descontoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descontoLabel">Aplicar Desconto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pedidos.update', $pedido->id)}}" method="post">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="produtos">Desconto em R$:</label>
                        <input type="number" name="desconto" value="{{$pedido->desconto}}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aplicar</button>
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