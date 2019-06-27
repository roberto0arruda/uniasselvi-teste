<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pedido cadastrar</title>
</head>
<body>
    <h1>cadastrar pedido</h1>

    <form action="{{route('pedidos.store')}}" method="post">
        {!! csrf_field() !!}
        <div>
            <label for="cliente">cliente</label>
            <select name="cliente" id="cliente">
                <option value=""></option>
                @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">cadastrar</button>
        </div>
    </form>
</body>
</html>