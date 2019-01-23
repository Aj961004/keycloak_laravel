<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desenvolvedor</title>

    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js"></script>
</head>
<body class="container">
    <div class="jumbotron">
        <h1 class="display-4">POC de Single Sign-On</h1>
        <p class="lead">Utilizando keycloak-php</p>
    </div>
    <div class="row text-right mb-2">
        <div class="col">
            <a href={{ url('home') }}>Home</a> |
            <a href={{ url('info') }}>Info</a> |
            <a href={{ url('desenvolvedor') }}>Rota para Desenvolvedor</a> |
            <a href={{ url('gerente') }}>Rota para Gerente</a> |
            <a href={{ url('admin') }}>Rota para Admin</a> |
            <a href={{ url('logout') }}>Logout</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Bem vindo, {{$username}}!</div>
        <div class="card-body">
            Só desenvolvedores têm acesso a essa página, e você é um! Que azar!<br>
            Olha o seu perfil:<br>
            {{ var_dump($roles) }}
        </div>
    </div>
</body>
</html>
