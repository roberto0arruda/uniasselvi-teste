@extends('adminlte::page')

@section('title', 'clientes')

@section('content_header')
<a href="{{route('clientes.create')}}">
    <button type="button" class="btn btn-success btn-sm" title="cadastro cliente">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</a>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Clientes</a></li>
</ol>
@stop

@section('content')
<div class="panel panel-warning">
    <div class="panel-heading" style="text-align: center">Lista de Clientes</div>

    <div class="panel-body table-responsive">
        <table class="table table-borderless table-striped" id="table">
            <thead>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-Mail</th>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                <tr data-entry-id="{{ $cliente->id }}" @if($cliente->deleted_at) class="danger" title="Cliente Bloqueado" @endif>
                    <td class=""><div class="text-center"><div class="btn-group">
                        <a href="{{route('clientes.edit', $cliente->id)}}" class="tip btn btn-info btn-xs" title="Editar"><i
                            class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="{{route('clientes.show', $cliente->id)}}" class="tip btn btn-warning btn-xs"
                            title="Detalhes"><i class="fa fa-file-text" aria-hidden="true"></i></a>

                        @if ($cliente->deleted_at)
                        <form action="{{route('clientes.restore', $cliente->id)}}" method="POST"
                            onsubmit="return confirm('DESbloquear?');" style="display:inline">
                            {!! csrf_field() !!}
                            <button type="submit" class="tip btn btn-info btn-xs" title="DESbloquear"><i class="fa fa-unlock"
                                aria-hidden="true"></i></button>
                        </form>
                        @else
                        <form action="{{route('clientes.destroy', $cliente->id)}}" method="POST"
                            onsubmit="return confirm('Bloquear?');" style="display:inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs" title="BLoquear"><i class="fa fa-lock"
                                aria-hidden="true"></i></button>
                        </form>
                        @endif
                    </div></div></td>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->cpf}}</td>
                    <td>{{$cliente->email}}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
    $('#cpf').mask("999.999.999-99");
</script>
@endsection