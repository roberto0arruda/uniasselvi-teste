<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>clientes</title>
</head>
<body>
    <h1>lista de clientes</h1>
    <a href="{{route('clientes.create')}}">cadastar</a>

    <table>
        <thead>
            <td>id</td>
            <td>nome</td>
            <td>cpf</td>
            <td>email</td>
            <td></td>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->email}}</td>
                <td>
                    <a href="{{route('clientes.edit', $cliente->id)}}">editar</a>
                    <form action="{{route('clientes.destroy', $cliente->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>