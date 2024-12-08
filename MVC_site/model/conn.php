<?php

#Entrada Online
// $servidor = "localhost";
// $usuario = "id19496209_root";
// $senha = "Gwtw4598213+";
// $banco = "id19496209_projeto";
// $porta = "3308";

#Teste Local
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "escola";
$porta = "3308";

$conn = mysqli_connect($servidor, $usuario, $senha , $banco , $porta);

if(!$conn){

    die("A conexão falhou: " . mysqli_connect_error());
}
//echo '<script>alert("Conexão bem suscedida")</script>';
//echo "Conexão bem suscedida";



// v5%BXecLwI$DBzs6EIiq senha 000WebHost
// base de dados : projeto
// Nome de Usuário do Banco de Dados : root
// Senha :  Gwtw4598213+
?>