<?php
//include_once();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <center>
    <h1>Login</h1>
    </center>
    <br>

 <center>
    <form name="dados_Login" method="post" action="crud.php?acao=login">

    <div class="contField">
    <div class="box">
        <input class="input" type="text" name="name" id="name" placeholder="Name">
        <label for="name">Nome</label>
    </div>
    <div class="box">
        <input class="input" type="text" name="Senha" id="Senha" placeholder="Senha">
        <label for="Senha">Senha</label>
    </div>
    <br>
    <br>
    <button class='btn-outline' type="submit" name="enviar" value="Enviar" action="submit">Logar</button>
    <button class='btn-outline' type="submit" value="Return" formaction='cadastro_log.php'>Cadastrar</button> 
    </center>
    <br>
    <br>
    </center>
    </form>

</body>
</html>