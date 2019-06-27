@extends('adminlte::page')

@section('title', 'produtos')

@section('content_header')
<a href="{{route('produtos.create')}}">
    <button type="button" class="btn btn-success btn-sm" title="cadastrar produto">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Produtos</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">lista de produtos</div>

    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped" id="table">
            <thead>
                <th></th>
                <th>ID</th>
                <th>codBarras</th>
                <th>Nome</th>
                <th>valor</th>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr data-entry-id="{{ $produto->id }}">
                    <td class=""><div class="text-center"><div class="btn-group">
                        <a href="{{route('produtos.edit', $produto->id)}}" class="tip btn btn-info btn-xs" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form action="{{route('produtos.destroy', $produto->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs" title="Deletar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></div></div>
                    </td>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->codbarras}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>R$ {{ number_format($produto->valor, 2)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop