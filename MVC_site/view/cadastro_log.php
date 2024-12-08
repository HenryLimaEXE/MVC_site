<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>

<header>
        <center><H1>Cadastrar Usuário<H1></center>
    </header>

    <center>
    <form name="log_dados" method="post" action="controller/crud.php?acao=log_insert">

    <div class="contField">
    <div class="box">
        <input class="input" type="text" name="name" id="name" placeholder="Name">
        <label for="ident">Nome</label>
    </div>
    <br>
    <div class="box">
        <input class="input" type="text" name="Senha" id="Senha" placeholder="Senha">  
        <label for="ident">Senha</label>
    </div>
    <br>
    <div class="box">
        <input class="input" type="text" name="Email" id="Email" placeholder="Email">
        <label for="ident">Email</label>
    </div>

</div>

    <br>
    <br>
    <button class='btn-outline' type="submit" name="Cadastrar" value="Cadastrar" action="submit">Cadastrar</button>
    <br>
    <br>
    <button class='btn-outline' type="Reset" value="Limpar">Limpar</button>    
    <br>
    <br>
    <button class='btn-outline' type="submit" value="Return" formaction='index.php'>Voltar</button>    
    </center>
    <br>
    <br>
        </center>
    </form>

    
    
</body>
</html>