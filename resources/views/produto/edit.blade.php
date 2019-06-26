<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>produto editar</title>
</head>
<body>
    <h1>editar produto</h1>

    <form action="{{route('produtos.update', $produto->id)}}" method="post">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div>
            <label for="codbarras">codbarras: </label>
            <input type="text" name="codbarras" id="codbarras" value="{{$produto->codbarras}}">
        </div>
        <div>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" value="{{$produto->nome}}">
        </div>
        <div>
            <label for="valor">valor: </label>
            <input type="text" name="valor" id="valor" value="{{$produto->valor}}">
        </div>
        <div>
            <button type="submit">Atualizar</button>
        </div>
    </form>
</body>
</html>