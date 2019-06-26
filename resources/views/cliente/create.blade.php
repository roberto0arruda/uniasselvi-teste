<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cliente cadastrar</title>
</head>
<body>
    <h1>cadastrar cliente</h1>

    <form action="{{route('clientes.store')}}" method="post">
        {!! csrf_field() !!}
        <div>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="cpf">Cpf: </label>
            <input type="text" name="cpf" id="cpf">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>