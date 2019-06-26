<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>produto cadastrar</title>
</head>
<body>
    <h1>cadastrar produto</h1>

    <form action="{{route('produtos.store')}}" method="post">
        {!! csrf_field() !!}
        <div>
            <label for="codbarras">codBarras: </label>
            <input type="text" name="codbarras" id="codbarras">
        </div>
        <div>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="valor">valor: </label>
            <input type="text" name="valor" id="valor">
        </div>
        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>