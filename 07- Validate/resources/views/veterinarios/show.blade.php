<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veterinarios</title>
</head>
<body>
    <a href="{{route('veteriarios.index')}}">Voltar</a>
    <br>
    <label>ID: </label>{{$dados['id']}}
    <br>
    <label>Nome: </label>{{$dados['nome']}}
    <br>
    <label>CRMV: </label>{{$dados['crmv']}}
    <br>
    <label>Especialidade: </label>{{$dados->especialidade->nome}}
</body>
</html>