<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cliente editar</title>
</head>
<body>
    <h1>editar cliente</h1>

    <form action="{{route('clientes.update', $cliente->id)}}" method="post">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" value="{{$cliente->nome}}">
        </div>
        <div>
            <label for="cpf">Cpf: </label>
            <input type="text" name="cpf" id="cpf" value="{{$cliente->cpf}}">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="{{$cliente->email}}">
        </div>
        <div>
            <button type="submit">Atualizar</button>
        </div>
    </form>
</body>
</html>