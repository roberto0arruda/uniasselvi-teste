<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>produtos</title>
</head>
<body>
    <h1>lista de produtos</h1>
    <a href="{{route('produtos.create')}}">cadastar</a>

    <table>
        <thead>
            <td>id</td>
            <td>codBarras</td>
            <td>nome</td>
            <td>valor</td>
            <td></td>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->codbarras}}</td>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->valor}}</td>
                <td>
                    <a href="{{route('produtos.edit', $produto->id)}}">editar</a>
                    <form action="{{route('produtos.destroy', $produto->id)}}" method="POST" onsubmit="return confirm('Tem Certeza?');">
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