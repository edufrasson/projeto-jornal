<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./../../../View/modules/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../../../View/modules/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form class="form" action="/login/save" method="post">
            <input class="form-control" name="id" type="hidden" />

            <label>Nome de Usuario:</label>
            <input class="form-control" name="nome" type="text" required/>

            <label>E-mail:</label>
            <input class="form-control" name="email" type="text" required/>

            <label>Senha:</label>
            <input class="form-control" name="senha" type="password" required/><br>

            <button class="btn btn-primary" type="submit">Entrar</button>
        </form>
    </div>
</body>

</html>